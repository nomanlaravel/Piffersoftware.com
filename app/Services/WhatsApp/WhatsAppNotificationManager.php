<?php

namespace App\Services\WhatsApp;

use App\Actions\SendWhatsAppNotification;

class WhatsAppNotificationManager
{
    public function send(
        $phone,
        $message,
        ?string $eventType = null,
        $user = null,
        ?string $templateName = null,
        ?array $templateParameters = null,
        ?string $category = null
    ): array {
        return app(SendWhatsAppNotification::class)->execute(
            phone: $phone,
            message: $message,
            eventType: $eventType,
            user: $user,
            templateName: $templateName,
            templateParameters: $templateParameters,
            category: $category
        );
    }

    public function sendWelcome($to, $customerName, $username = null, $password = null, $userModel = null): array
    {
        $erpLink = config('app.url');
        if ($erpLink === 'http://localhost') {
            $erpLink = 'https://piffersoftware.com';
        }
        $message = "Welcome to Piffers Security System!\n\n" .
            "Dear *{$customerName}*,\n\n" .
            "We are pleased to inform you that your account has been successfully created on our portal.\n\n" .
            "You can now access your dashboard using the following details:\n\n" .
            "🔗 ERP Link: {$erpLink}\n" .
            "👤 Username: {$username}\n\n" .
            "To set your password securely, please use the \"Forgot Password\" option on the login page.\n\n" .
            "Through this portal, you will be able to manage your services, view reports, and stay updated with all activities related to your account.\n\n" .
            "If you face any issues while logging in or require assistance, feel free to contact our support team.\n\n" .
            "Thank you for choosing Piffers Security System. We look forward to serving you.\n\n" .
            "Best Regards,\n" .
            "Piffers Security System";

        $params = [
            ['type' => 'text', 'text' => $customerName],
            ['type' => 'text', 'text' => $erpLink],
            ['type' => 'text', 'text' => $username ?? 'N/A'],
        ];

        return $this->send(
            phone: (string)$to,
            message: $message,
            eventType: 'welcome',
            user: $userModel,
            templateName: 'customerwelcome',
            templateParameters: $params,
            category: 'UTILITY'
        );
    }

    public function sendHrmWelcome($to, $employeeName, $roleType, $username = null, $userModel = null): array
    {
        $erpLink = config('app.url');
        if ($erpLink === 'http://localhost') {
            $erpLink = 'https://piffersoftware.com/';
        }
        $message = "Dear {$employeeName},\n\n" .
            "You have been successfully added to the Piffers Security System as {$roleType}.\n\n" .
            "You can now access your profile and relevant system features using the link below:\n\n" .
            "Portal Link: {$erpLink}\n" .
            "Username: {$username}\n\n" .
            "To set your password securely, please visit the login page and use the \"Forgot Password\" option.\n" .
            "If you face any issues while accessing your account, feel free to contact the admin team.\n\n" .
            "Welcome aboard and thank you for being part of Piffers Security System.\n\n" .
            "Best Regards,\n" .
            "Piffers Security System";

        $params = [
            ['type' => 'text', 'text' => $employeeName],
            ['type' => 'text', 'text' => $roleType],
            ['type' => 'text', 'text' => $username],
        ];

        return $this->send(
            phone: $to,
            message: $message,
            eventType: 'hrm_template',
            user: $userModel,
            templateName: 'hrm_template',
            templateParameters: $params,
            category: 'UTILITY'
        );
    }
}