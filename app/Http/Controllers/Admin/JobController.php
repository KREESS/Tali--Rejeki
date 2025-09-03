<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the jobs.
     */
    public function index(Request $request)
    {
        $query = Job::query();

        // Search functionality
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by employment type
        if ($request->filled('employment_type')) {
            $query->where('employment_type', $request->employment_type);
        }

        // Filter by remote policy
        if ($request->filled('remote_policy')) {
            $query->where('remote_policy', $request->remote_policy);
        }

        // Sort
        $sortBy = $request->get('sort_by', 'created_at');
        $sortDir = $request->get('sort_dir', 'desc');
        $query->orderBy($sortBy, $sortDir);

        $jobs = $query->paginate(15)->withQueryString();

        $stats = [
            'total' => Job::count(),
            'published' => Job::where('status', 'published')->count(),
            'draft' => Job::where('status', 'draft')->count(),
            'open' => Job::open()->count(),
        ];

        return view('admin.jobs.index', [
            'title' => 'Manajemen Lowongan Kerja',
            'jobs' => $jobs,
            'stats' => $stats,
        ]);
    }

    /**
     * Show the form for creating a new job.
     */
    public function create()
    {
        return view('admin.jobs.create', [
            'title' => 'Tambah Lowongan Kerja Baru',
        ]);
    }

    /**
     * Store a newly created job in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:255',
            'description_html' => 'required|string',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|in:full-time,part-time,contract,internship',
            'remote_policy' => 'required|in:onsite,hybrid,remote',
            'department' => 'nullable|string|max:255',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0|gte:salary_min',
            'salary_currency' => 'nullable|string|max:10',
            'apply_url' => 'nullable|url|max:255',
            'apply_email' => 'nullable|email|max:255',
            'status' => 'required|in:draft,published,closed',
            'published_at' => 'nullable|date',
            'close_at' => 'nullable|date|after:now',
        ]);

        // Set default currency if not provided
        if (empty($validated['salary_currency'])) {
            $validated['salary_currency'] = 'IDR';
        }

        // Auto-generate slug
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        try {
            DB::beginTransaction();

            $job = Job::create($validated);

            DB::commit();

            return redirect()
                ->route('admin.jobs.show', $job)
                ->with('success', 'Lowongan kerja berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan lowongan kerja: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified job.
     */
    public function show(Job $job)
    {
        return view('admin.jobs.show', [
            'title' => 'Detail Lowongan: ' . $job->title,
            'job' => $job,
        ]);
    }

    /**
     * Show the form for editing the specified job.
     */
    public function edit(Job $job)
    {
        return view('admin.jobs.edit', [
            'title' => 'Edit Lowongan: ' . $job->title,
            'job' => $job,
        ]);
    }

    /**
     * Update the specified job in storage.
     */
    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:255',
            'description_html' => 'required|string',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|in:full-time,part-time,contract,internship',
            'remote_policy' => 'required|in:onsite,hybrid,remote',
            'department' => 'nullable|string|max:255',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0|gte:salary_min',
            'salary_currency' => 'nullable|string|max:10',
            'apply_url' => 'nullable|url|max:255',
            'apply_email' => 'nullable|email|max:255',
            'status' => 'required|in:draft,published,closed',
            'published_at' => 'nullable|date',
            'close_at' => 'nullable|date|after:now',
        ]);

        // Set default currency if not provided
        if (empty($validated['salary_currency'])) {
            $validated['salary_currency'] = 'IDR';
        }

        try {
            DB::beginTransaction();

            $job->update($validated);

            DB::commit();

            return redirect()
                ->route('admin.jobs.show', $job)
                ->with('success', 'Lowongan kerja berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui lowongan kerja: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified job from storage.
     */
    public function destroy(Job $job)
    {
        try {
            DB::beginTransaction();

            $job->delete();

            DB::commit();

            return redirect()
                ->route('admin.jobs.index')
                ->with('success', 'Lowongan kerja berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->with('error', 'Terjadi kesalahan saat menghapus lowongan kerja: ' . $e->getMessage());
        }
    }

    /**
     * Toggle job status between draft and published.
     */
    public function toggleStatus(Job $job)
    {
        try {
            $newStatus = $job->status === 'published' ? 'draft' : 'published';

            $job->update([
                'status' => $newStatus,
                'published_at' => $newStatus === 'published' ? now() : null,
            ]);

            $message = $newStatus === 'published'
                ? 'Lowongan kerja berhasil dipublikasikan!'
                : 'Lowongan kerja berhasil diubah ke draft!';

            return back()->with('success', $message);
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat mengubah status: ' . $e->getMessage());
        }
    }

    /**
     * Bulk actions for multiple jobs.
     */
    public function bulkActions(Request $request)
    {
        $request->validate([
            'action' => 'required|in:delete,publish,draft',
            'jobs' => 'required|array|min:1',
            'jobs.*' => 'exists:job_postings,id',
        ]);

        try {
            DB::beginTransaction();

            $jobs = Job::whereIn('id', $request->jobs);
            $count = $jobs->count();

            switch ($request->action) {
                case 'delete':
                    $jobs->delete();
                    $message = "{$count} lowongan kerja berhasil dihapus!";
                    break;

                case 'publish':
                    $jobs->update([
                        'status' => 'published',
                        'published_at' => now(),
                    ]);
                    $message = "{$count} lowongan kerja berhasil dipublikasikan!";
                    break;

                case 'draft':
                    $jobs->update([
                        'status' => 'draft',
                        'published_at' => null,
                    ]);
                    $message = "{$count} lowongan kerja berhasil diubah ke draft!";
                    break;
            }

            DB::commit();

            return back()->with('success', $message);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat melakukan aksi bulk: ' . $e->getMessage());
        }
    }
}
