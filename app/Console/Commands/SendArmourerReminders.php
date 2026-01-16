<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\CustomerArmourer;
use App\Models\ReminderNotification;
use App\Mail\ArmourerVisitReminder;
use App\Notifications\ArmourerReminderNotification;

class SendArmourerReminders extends Command
{
    protected $signature = 'send:armourer-reminders';
    protected $description = 'Send reminders to customers whose armourer authorization issue is due 3 months ago';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get the date exactly 3 months ago
        $targetDate = Carbon::now()->subMonths(3)->toDateString(); // e.g., 2025-03-04

        $this->info("Fetching records with arm_auth_issue date: " . $targetDate);

        // Fetch customers with issue date exactly 3 months ago
        $armourers = CustomerArmourer::with('customer')
            ->whereDate('arm_auth_issue', $targetDate)
            ->whereHas('customer', function ($query) {
                $query->where('notification_status', 1);
            })
            ->get();

        if ($armourers->isEmpty()) {
            $this->info("No reminders due today.");
        } else {
            foreach ($armourers as $armourer) {
                $this->sendReminder($armourer);
            }

            $this->info("Reminders sent to " . $armourers->count() . " customers.");
        }
    }

    public function sendReminder($armourer)
    {
        $customer = $armourer->customer;
        $email = $customer->email;
        $issueDate = $armourer->arm_auth_issue;

        // Send email to customer
        Mail::to($email)->send(new ArmourerVisitReminder($armourer));

        // Also send to admin
        Mail::to('Erp.piffers@gmail.com')->send(new ArmourerVisitReminder($armourer));

        // 🔔 Save notification for customer

        ReminderNotification::create([
            'user_id' => $customer->id,
            'entity_type' => 'customer',
            'entity_id' => $customer->id,
            'title' => 'Armourer Authorization Reminder',
            'message' => "Dear {$customer->customers_name}, your armourer authorization was issued on {$issueDate}, please schedule your visit.",
            'is_read' => false,
        ]);
        $this->info("Reminder saved for: {$email} and Admin.");

    }

}
