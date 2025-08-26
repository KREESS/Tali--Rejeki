<?php

return [
    /*
     * The notification that will be sent when a user receives a welcome email.
     * This notification should have a `via` method and return 'mail'.
     */
    'notification' => \App\Notifications\WelcomeNotification::class,

    /*
     * The mailable that will be sent when a user receives a welcome email.
     * When set to null, the default notification will be used.
     */
    'mailable' => null,

    /*
     * Here you can specify the number of days a welcome link is valid.
     * If set to null, the link will be valid indefinitely.
     */
    'expires_in_days' => 1,

    /*
     * When set to true, the welcome notification will be resent if the user
     * hasn't set their password yet and the welcome notification is sent again.
     */
    'resend_if_pending' => true,
];
