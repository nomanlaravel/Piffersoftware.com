<?php


namespace App\Notifications;

use Illuminate\Bus\Queueable;

class ArmourerReminderNotification
{
    use Queueable;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function toArray()
    {
        return [
            'title' => 'Armourer Visit Reminder',
            'message' => $this->data['message'],
            'recipient_email' => $this->data['email'] ?? null,
            'issue_date' => $this->data['issue_date'] ?? null,
        ];
    }
}

