<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Hrm;
use Illuminate\Console\Command;
use App\Mail\CNICExpiryReminderMail;
use App\Models\ReminderNotification;
use Illuminate\Support\Facades\Mail;
use Log;
use App\Services\WhatsApp\WhatsAppNotificationManager;

class SendCNICExpiryReminders extends Command
{
    protected $signature = 'send:cnic-reminders';

    protected $description = 'Send CNIC expiry reminders to employees 1 month before expiry date';

    public function handle()
    {
        $today = Carbon::today();
        $count = 0;

        $this->info("📅 Today's Date: " . $today->format('Y-m-d'));

        $hrms = Hrm::whereNotNull('cnic_expire')->get();

        foreach ($hrms as $hrm) {
            $expiryDate = Carbon::parse($hrm->cnic_expire)->startOfDay();
            $reminderDate = $expiryDate->copy()->subMonth();

            $this->info("🔍 Checking CNIC expiry for: {$hrm->name}");
            $this->info("   - Expiry Date: {$expiryDate->format('Y-m-d')}");
            $this->info("   - Reminder Date: {$reminderDate->format('Y-m-d')}");

            if ($reminderDate->isSameDay($today)) {

                   // Whatsapp intergeration
                $whatsappTo = $hrm->cell;
                if ($whatsappTo) {
                    app(WhatsAppNotificationManager::class)->sendCnicExpiryReminder(
                        to: $whatsappTo,
                        hrmName: $hrm->name,
                        expiry_date: Carbon::parse($hrm->cnic_expire)->format('d M Y'),
                        userModel: $hrm
                    );
                    Log::info('CNIC Expiry Reminder WhatsApp sent to: ' . $whatsappTo);
                }

                // send email
                Mail::to($hrm->email)->send(new CNICExpiryReminderMail($hrm));
                $this->info("✅ Reminder sent to {$hrm->name} ({$hrm->email})");
                Mail::to('Erp.piffers@gmail.com')->send(new CNICExpiryReminderMail($hrm));
                // create reminder notification
                ReminderNotification::create([
                    'user_id'     => $hrm->id,
                    'entity_type' => 'hrm',
                    'entity_id'   => $hrm->id,
                    'title'       => 'CNIC Expiry',
                    'message'     => "Dear {$hrm->name}, your CNIC will expire on {$expiryDate->format('d M Y')}. Please renew it in time.",
                    'is_read'     => false,
                ]);

                $count++;
            } else {
                $this->warn("❌ Not today. Skipping...");
            }
        }

        $this->info("🎯 Total CNIC Expiry Reminders Sent: {$count}");
    }
}
