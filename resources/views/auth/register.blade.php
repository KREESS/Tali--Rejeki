<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
<h1>Register</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('register.submit') }}">
    @csrf
    <div>
        <label>Nama</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div>
        <label>Password</label>
        <input type="password" name="password" required>
    </div>
    <div>
        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirmation" required>
    </div>
    <button type="submit">Daftar</button>
</form>

<p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
</body>
</html>
