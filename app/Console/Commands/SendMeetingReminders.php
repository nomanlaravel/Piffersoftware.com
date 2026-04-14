<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;
use App\Mail\MeetingReminderMail;
use App\Models\ReminderNotification;
use Carbon\Carbon;
use Log;
use App\Services\WhatsApp\WhatsAppNotificationManager;

class SendMeetingReminders extends Command
{
    protected $signature = 'send:meeting-reminders';
    protected $description = 'Send meeting reminders based on last meeting date and frequency';

    public function handle()
    {
        $today = Carbon::today();
        $count = 0;

        $this->info("📅 Today's Date: " . $today->format('Y-m-d'));

        $customers = Customer::where('notification_status', 1)
            ->whereNotNull('meeting_date')
            ->whereNotNull('meeting_freq')
            ->get();

        if ($customers->isEmpty()) {
            $this->warn("❌ No customers with meeting date and frequency.");
            return;
        }

        foreach ($customers as $customer) {
            $this->info("🔍 Checking: {$customer->customers_name}");
            $this->info("   - Last Meeting: " . $customer->meeting_date . ", Frequency: " . $customer->meeting_freq);

            $original = Carbon::parse($customer->meeting_date)->startOfDay();
            $nextMeeting = $original->copy();

            while ($nextMeeting->lessThan($today)) {
                $nextMeeting->addMonths($customer->meeting_freq);
            }

            $this->info("   - Next Meeting: " . $nextMeeting->format('Y-m-d'));

            if ($nextMeeting->isSameDay($today)) {
                
                // Whatsapp intergeration
                   $whatsappTo = !empty($customer->whatsapp_number) ? $customer->whatsapp_number : $customer->phone;
                        if (!empty($whatsappTo)) {
                            app(WhatsAppNotificationManager::class)->sendMeetingReminder(
                                to: $whatsappTo,
                                customerName: $customer->customers_name,
                                meetingDate: $nextMeeting->format('d M Y'),
                                userModel: $customer
                            );
                            Log::info('Meeting Reminder WhatsApp sent to: ' . $whatsappTo);
                        }
                // Send email reminder
                Mail::to($customer->email)->send(new MeetingReminderMail($customer));
                Mail::to('Erp.piffers@gmail.com')->send(new MeetingReminderMail($customer));
                // Save in ReminderNotification table
                ReminderNotification::create([
                    'user_id' => $customer->id,
                    'entity_type' => 'customer',
                    'entity_id' => $customer->id,
                    'title' => 'Meeting Reminder',
                    'message' => "Dear {$customer->customers_name}, your next meeting is scheduled on {$nextMeeting->format('d M Y')}. Please be prepared.",
                    'is_read' => false,
                ]);

                $this->info("✅ Reminder sent & saved for {$customer->customers_name} ({$customer->email})");
                $count++;
            } else {
                $this->warn("❌ Not today. Skipping...");
            }
        }

        $this->info("🎯 Total Reminders Sent: {$count}");
    }
}
