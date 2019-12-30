<?php

namespace App\Services;

use App\Events\UserNotificationEvent;
use App\Models\{UserNotification};

class NotificationService
{
    public function createUserNotification($input)
    {
        return UserNotification::create($input);
    }

    public function sendPublishedNotificationToUser($story)
    {
        $notification = $this->createUserNotification([
            'title' => 'Story Published',
            'description' => $story->title.' Published'
        ]);

        broadcast(UserNotificaticationEvent());
    }
}