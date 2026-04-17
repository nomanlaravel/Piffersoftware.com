<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Hrm;
use Illuminate\Console\Command;
use App\Mail\ValidityReminderMail;
use App\Models\ReminderNotification;
use Illuminate\Support\Facades\Mail;
use App\Services\WhatsApp\WhatsAppNotificationManager;
use Log;

class SendValidityReminders extends Command
{
    protected $signature = 'send:validity-reminders';
    protected $description = 'Send reminders 1 month before validity date';

    public function handle()
    {
        $today = Carbon::today();
        $count = 0;

        $this->info("📅 Today's Date: " . $today->format('Y-m-d'));

        $hrms = Hrm::whereNotNull('s_v_date')->get();

        foreach ($hrms as $hrm) {
            $validityDate = Carbon::parse($hrm->s_v_date)->startOfDay();
            $reminderDate = $validityDate->copy()->subMonth();

            $this->info("🔍 Checking: {$hrm->name}");
            $this->info("   - Validity Date: {$validityDate->format('Y-m-d')}");
            $this->info("   - Reminder Date: {$reminderDate->format('Y-m-d')}");

            if ($reminderDate->isSameDay($today)) {

                // Whatsapp intergeration
                $whatsappTo = $hrm->cell;
                if ($whatsappTo) {
                    app(WhatsAppNotificationManager::class)->sendValidityReminder(
                        to: $whatsappTo,
                        hrmName: $hrm->name,
                        send_validity_date: Carbon::parse($hrm->s_v_date)->format('d M Y'),
                        userModel: $hrm
                    );
                    Log::info('Contract Reminder WhatsApp sent to: ' . $whatsappTo);
                }

                Mail::to($hrm->email)->send(new ValidityReminderMail($hrm));
                Mail::to('Erp.piffers@gmail.com')->send(new ValidityReminderMail($hrm));
                $this->info("✅ Reminder sent to {$hrm->name} ({$hrm->email})");
                ReminderNotification::create([
                    'user_id' => $hrm->id,
                    'entity_type' => 'hrm',
                    'entity_id' => $hrm->id,
                    'title' => 'validity date Reminder',
                    'message' => "Dear {$hrm->name}, your validity date {$hrm->s_v_date} date.",
                    'is_read' => false,
                ]);
                $count++;
            } else {
                $this->warn("❌ Not due today. Skipping...");
            }
        }

        $this->info("🎯 Total Validity Reminders Sent: {$count}");
    }
}
