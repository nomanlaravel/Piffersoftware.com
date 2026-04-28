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
        ?string $category = null,
        ?array $fullComponents = null
    ): array {
        return app(SendWhatsAppNotification::class)->execute(
            phone: $phone,
            message: $message,
            eventType: $eventType,
            user: $user,
            templateName: $templateName,
            templateParameters: $templateParameters,
            category: $category,
            fullComponents: $fullComponents
        );
    }

    public function sendWelcome($to, $customerName, $username = null, $password = null, $userModel = null): array
    {
        $erpLink = config('app.url');
        if ($erpLink === 'http://localhost') {
            $erpLink = 'https://piffersoftware.com';
        }
        $customerNameFallback = !empty($customerName) ? $customerName : 'N/A';
        $usernameFallback = !empty($username) ? $username : 'N/A';

        $message = "Welcome to Piffers Security System!\n\n"
            . "Dear *{$customerNameFallback}*,\n\n"
            . "We are pleased to inform you that your account has been successfully created on our portal.\n\n"
            . "You can now access your dashboard using the following details:\n\n"
            . "🔗 ERP Link: {$erpLink}\n"
            . "👤 Username: {$usernameFallback}\n\n"
            . "To set your password securely, please use the \"Forgot Password\" option on the login page.\n\n"
            . "Through this portal, you will be able to manage your services, view reports, and stay updated with all activities related to your account.\n\n"
            . "If you face any issues while logging in or require assistance, feel free to contact our support team.\n\n"
            . "Thank you for choosing Piffers Security System. We look forward to serving you.\n\n"
            . "Best Regards,\n"
            . 'Piffers Security System';

        $params = [
            ['type' => 'text', 'text' => $customerNameFallback],
            ['type' => 'text', 'text' => $erpLink],
            ['type' => 'text', 'text' => $usernameFallback],
        ];

        return $this->send(
            phone: (string) $to,
            message: $message,
            eventType: 'welcome',
            user: $userModel,
            templateName: 'customerwelcome',
            templateParameters: $params,
            category: 'UTILITY'
        );
    }

    public function sendMeetingReminder($to, $customerName, $meetingDate = null, $userModel = null): array
    {
        $erpLink = config('app.url');
        if ($erpLink === 'http://localhost') {
            $erpLink = 'https://piffersoftware.com';
        }
        $customerNameFallback = !empty($customerName) ? $customerName : 'N/A';
        $meetingDateFallback = !empty($meetingDate) ? $meetingDate : 'N/A';

        $message = "Dear *{$customerNameFallback}*, your next meeting is scheduled on *{$meetingDateFallback}*. Please be prepared.";

        $params = [
            ['type' => 'text', 'text' => $customerNameFallback],
            ['type' => 'text', 'text' => $meetingDateFallback],
        ];

        return $this->send(
            phone: (string) $to,
            message: $message,
            eventType: 'customer_meeting_reminder',
            user: $userModel,
            templateName: 'customer_meeting_reminder',
            templateParameters: $params,
            category: 'UTILITY'
        );
    }

    public function sendArmourerReminder($to, $customerName, $issueDate = null, $userModel = null): array
    {
        $erpLink = config('app.url');
        if ($erpLink === 'http://localhost') {
            $erpLink = 'https://piffersoftware.com';
        }
        $customerNameFallback = !empty($customerName) ? $customerName : 'N/A';
        $issueDateFallback = !empty($issueDate) ? $issueDate : 'N/A';

        $message = "Dear *{$customerNameFallback}*, your next meeting is scheduled on *{$issueDateFallback}*. Please be prepared.";

        $params = [
            ['type' => 'text', 'text' => $customerNameFallback],
            ['type' => 'text', 'text' => $issueDateFallback],
        ];

        return $this->send(
            phone: (string) $to,
            message: $message,
            eventType: 'customer_meeting_reminder',
            user: $userModel,
            templateName: 'customer_meeting_reminder',
            templateParameters: $params,
            category: 'UTILITY'
        );
    }

    public function sendContractExpiry($to, $customerName, $contract_end_date = null, $userModel = null): array
    {
        $erpLink = config('app.url');
        if ($erpLink === 'http://localhost') {
            $erpLink = 'https://piffersoftware.com';
        }
        $customerNameFallback = !empty($customerName) ? $customerName : 'N/A';
        $expiryDateFallback = !empty($contract_end_date) ? $contract_end_date : 'N/A';

        $message = "Dear *{$customerNameFallback}*, your contract will expire on *{$expiryDateFallback}* date.";

        $params = [
            ['type' => 'text', 'text' => $customerNameFallback],
            ['type' => 'text', 'text' => $expiryDateFallback],
        ];

        return $this->send(
            phone: (string) $to,
            message: $message,
            eventType: 'contract_expiry',
            user: $userModel,
            templateName: 'contract_expiry',
            templateParameters: $params,
            category: 'UTILITY'
        );
    }

    public function sendValidityReminder($to, $hrmName, $send_validity_date = null, $userModel = null): array
    {
        $erpLink = config('app.url');
        if ($erpLink === 'http://localhost') {
            $erpLink = 'https://piffersoftware.com';
        }
        $hrmNameFallback = !empty($hrmName) ? $hrmName : 'N/A';
        $validityDateFallback = !empty($send_validity_date) ? $send_validity_date : 'N/A';

        $message = "Dear *{$hrmNameFallback}*, your contract will expire on *{$validityDateFallback}* date.";

        $params = [
            ['type' => 'text', 'text' => $hrmNameFallback],
            ['type' => 'text', 'text' => $validityDateFallback],
        ];

        return $this->send(
            phone: (string) $to,
            message: $message,
            eventType: 'validity_reminder',
            user: $userModel,
            templateName: 'validity_reminder',
            templateParameters: $params,
            category: 'UTILITY'
        );
    }

    public function sendLookBackReminder($to, $hrmName, $count = null, $notes = null, $userModel = null): array
    {
        $erpLink = config('app.url');
        if ($erpLink === 'http://localhost') {
            $erpLink = 'https://piffersoftware.com';
        }
        $hrmNameFallback = !empty($hrmName) ? $hrmName : 'N/A';
        $countFallback = !empty($count) ? $count : 'N/A';
        $notesFallback = !empty($notes) ? $notes : 'N/A';

        $message = "Subject: Look Back Reminder *{$countFallback}*
        Dear *{$hrmNameFallback}*, Reminder *{$countFallback}* triggered. Notes: *{$notesFallback}* content.";

        $params = [
            ['type' => 'text', 'text' => (string) $hrmNameFallback],
            ['type' => 'text', 'text' => (string) $countFallback],
            ['type' => 'text', 'text' => (string) $notesFallback]
        ];

        return $this->send(
            phone: (string) $to,
            message: $message,
            eventType: 'look_back_reminders',
            user: $userModel,
            templateName: 'look_back_reminders',
            templateParameters: $params,
            category: 'UTILITY'
        );
    }

    public function sendInspectionFollowUpReminder($to, $hrmName, $inspection_date = null, $userModel = null): array
    {
        $erpLink = config('app.url');
        if ($erpLink === 'http://localhost') {
            $erpLink = 'https://piffersoftware.com';
        }
        $hrmNameFallback = !empty($hrmName) ? $hrmName : 'N/A';
        $inspection_dateFallback = !empty($inspection_date) ? $inspection_date : 'N/A';

        $message = "Dear *{$hrmNameFallback}*, your follow-up reminders *{$inspection_dateFallback}* date.";

        $params = [
            ['type' => 'text', 'text' => $hrmNameFallback],
            ['type' => 'text', 'text' => $inspection_dateFallback]
        ];

        return $this->send(
            phone: (string) $to,
            message: $message,
            eventType: 'hrm_inspection_reminder',
            user: $userModel,
            templateName: 'hrm_inspection_reminder',
            templateParameters: $params,
            category: 'UTILITY'
        );
    }

    public function sendCnicExpiryReminder($to, $hrmName, $expiry_date = null, $userModel = null): array
    {
        $erpLink = config('app.url');
        if ($erpLink === 'http://localhost') {
            $erpLink = 'https://piffersoftware.com';
        }
        $hrmNameFallback = !empty($hrmName) ? $hrmName : 'N/A';
        $expiry_dateFallback = !empty($expiry_date) ? $expiry_date : 'N/A';

        $message = "Dear *{$hrmNameFallback}*, your CNIC will expire on *{$expiry_dateFallback}*. Please renew it in time.


";

        $params = [
            ['type' => 'text', 'text' => $hrmNameFallback],
            ['type' => 'text', 'text' => $expiry_dateFallback]
        ];

        return $this->send(
            phone: (string) $to,
            message: $message,
            eventType: 'hrm_cnic_expiry_reminder',
            user: $userModel,
            templateName: 'hrm_cnic_expiry_reminder',
            templateParameters: $params,
            category: 'UTILITY'
        );
    }

    public function sendCustomerReport($to, $recipientName, $date, $userModel = null): array
    {
        // 1. Fallbacks to prevent API errors
        $nameFallback = !empty($recipientName) ? $recipientName : 'Customer';
        $dateFallback = !empty($date) ? $date : 'N/A';

        // If this was not you, please contact support immediately.
        $message = "
        Dear *{$nameFallback}*, your notification preferences were updated on *{$dateFallback}*.
        If this was not you, please contact support immediately.
        ";

        // 3. Parameters in EXACT order of {{1}}, {{2}}, {{3}}
        $params = [
            ['type' => 'text', 'text' => $nameFallback],  // {{1}}
            ['type' => 'text', 'text' => $dateFallback],  // {{2}}
        ];

        return $this->send(
            phone: (string) $to,
            message: $message,
            eventType: 'customer_notification_settings_updated',
            user: $userModel,
            templateName: 'customer_notification_settings_updated',  // Must match Meta Dashboard name
            templateParameters: $params,
            category: 'UTILITY'
        );
    }

    public function sendCustomerUpdate($to, $recipientName, $customerId, $deptName, $viewUrl, $userModel = null): array
    {
        $nameFallback = !empty($recipientName) ? $recipientName : 'Customer';
        $idFallback = !empty($customerId) ? (string) $customerId : '-';
        $deptFallback = !empty($deptName) ? $deptName : '-';
        $urlFallback = !empty($viewUrl) ? $viewUrl : config('app.url');

        $message = "Hello *{$nameFallback}*, your profile has been updated.\nID: {$idFallback}\nDepartment: {$deptFallback}\nLink: {$urlFallback}\n\nThank you.";

        $params = [
            ['type' => 'text', 'text' => $nameFallback],  // {{1}}
            ['type' => 'text', 'text' => $idFallback],  // {{2}}
            ['type' => 'text', 'text' => $deptFallback],  // {{3}}
            ['type' => 'text', 'text' => $urlFallback],  // {{4}}
        ];

        return $this->send(
            phone: (string) $to,
            message: $message,
            eventType: 'customer_update_confirmation',
            user: $userModel,
            templateName: 'customer_update_confirmation',
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
        $employeeNameFallback = !empty($employeeName) ? $employeeName : 'N/A';
        $roleTypeFallback = !empty($roleType) ? $roleType : 'N/A';
        $usernameFallback = !empty($username) ? $username : 'N/A';

        $message = "Dear {$employeeNameFallback},\n\n"
            . "You have been successfully added to the Piffers Security System as {$roleTypeFallback}.\n\n"
            . "You can now access your profile and relevant system features using the link below:\n\n"
            . "Portal Link: {$erpLink}\n"
            . "Username: {$usernameFallback}\n\n"
            . "To set your password securely, please visit the login page and use the \"Forgot Password\" option.\n"
            . "If you face any issues while accessing your account, feel free to contact the admin team.\n\n"
            . "Welcome aboard and thank you for being part of Piffers Security System.\n\n"
            . "Best Regards,\n"
            . 'Piffers Security System';

        $params = [
            ['type' => 'text', 'text' => $employeeNameFallback],
            ['type' => 'text', 'text' => $roleTypeFallback],
            ['type' => 'text', 'text' => $usernameFallback],
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

    /**
     * Notify customer when a guard/staff/hrm member is assigned to them.
     */
    public function sendHrmAssignmentToCustomer($to, $customerName, $hrmName, $hrmCategory, $userModel = null): array
    {
        $customerNameFallback = !empty($customerName) ? $customerName : 'Customer';
        $hrmNameFallback = !empty($hrmName) ? $hrmName : 'N/A';
        $hrmCategoryFallback = !empty($hrmCategory) ? $hrmCategory : 'Staff Member';

        $message = "Dear *{$customerNameFallback}*,\n\n"
            . "A new staff member has been assigned to your service.\n\n"
            . "Employee Name: *{$hrmNameFallback}*\n"
            . "Designation: *{$hrmCategoryFallback}*\n\n"
            . 'For any questions, please contact Piffers Security System.';

        $params = [
            ['type' => 'text', 'text' => $customerNameFallback],
            ['type' => 'text', 'text' => $hrmNameFallback],
            ['type' => 'text', 'text' => $hrmCategoryFallback],
        ];

        return $this->send(
            phone: (string) $to,
            message: $message,
            eventType: 'hrm_assignment_to_customer',
            user: $userModel,
            templateName: 'hrm_assignment_to_customer',
            templateParameters: $params,
            category: 'UTILITY'
        );
    }

    /**
     * Trigger a feedback flow for the customer.
     */
    public function sendFeedbackFlow($to, $recipientName, $userModel = null): array
    {
        $nameFallback = !empty($recipientName) ? $recipientName : 'Customer';

        $message = "Hello {$nameFallback}, \n"
            . 'we value your feedback. Please click the button below to start our short feedback survey.';

        // For templates with FLOW buttons, we must provide the button component structure
        $fullComponents = [
            [
                'type' => 'body',
                'parameters' => [
                    ['type' => 'text', 'text' => $nameFallback],  // {{1}}
                ],
            ],
            [
                'type' => 'button',
                'sub_type' => 'flow',
                'index' => '0',
                'parameters' => [
                    [
                        'type' => 'action',
                        'action' => [
                            'flow_token' => 'feedback_token_' . time(),
                        ],
                    ]
                ]
            ]
        ];

        return $this->send(
            phone: (string) $to,
            message: $message,
            eventType: 'trigger_feedbacks_flow',
            user: $userModel,
            templateName: 'trigger_feedbacks_flow',
            category: 'UTILITY',
            fullComponents: $fullComponents
        );
    }
}
