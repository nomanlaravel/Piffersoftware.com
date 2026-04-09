<?php

namespace App\Services\WhatsApp;

use App\Actions\SendWhatsAppNotification;

class WhatsAppNotificationManager
{
    public function send(
        string $phone,
        string $message,
        ?string $eventType = null,
        $user = null // ✅ pass model
    ): array {
        return app(SendWhatsAppNotification::class)->execute(
            phone: $phone,
            message: $message,
            eventType: $eventType,
            user: $user
        );
    }
}