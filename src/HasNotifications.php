<?php

namespace Nanuc\LaravelNotifications;

use Carbon\Carbon;
use Nanuc\LaravelNotifications\Models\Notification;

trait HasNotifications
{

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function dueNotifications()
    {
        return $this->notifications()
            ->where('is_active', true)
            ->whereDate('expires_at', '>', Carbon::now());
    }

    public function dueNotificationsForUser($user)
    {
        $userSentNotifications = $user->notifications;

        return $this->dueNotifications()
            ->get()
            ->diff($userSentNotifications);
    }

}