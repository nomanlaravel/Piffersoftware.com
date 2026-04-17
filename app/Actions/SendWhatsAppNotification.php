<?php

namespace App\Actions;

use App\Models\WhatsappMessageLog;
use App\Services\WhatsApp\NeuapixWhatsAppService;

class SendWhatsAppNotification
{
    public function __construct(
        private readonly NeuapixWhatsAppService $whatsAppService
    ) {
    }

    public function execute(
        $phone,
        $message,
        ?string $eventType = null,
        $user = null,
        ?string $templateName = null,
        ?array $templateParameters = null,
        ?string $category = null,
        ?array $fullComponents = null
    ): array {

        $result = $this->whatsAppService->sendText(
            to: $phone,
            message: $message,
            user: $user,
            templateName: $templateName,
            templateParameters: $templateParameters,
            category: $category,
            fullComponents: $fullComponents
        );

        // NOTE: We do NOT update last_whatsapp_interaction_at here.
        // That timestamp should only be updated when the CUSTOMER sends a message to the business (e.g., via Webhook).

        // logging remains same
        return $result;
    }
}