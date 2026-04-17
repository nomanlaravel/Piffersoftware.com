<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Hrm;
use Illuminate\Console\Command;
use App\Models\ReminderNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\InspectionFollowupReminderMail;
use Log;
use App\Services\WhatsApp\WhatsAppNotificationManager;

class SendInspectionFollowupReminder extends Command
{
    protected $signature = 'reminder:inspection-followup';
    protected $description = 'Send follow-up reminders 1 month after Date of Inspection';

    public function handle()
    {
        $today = Carbon::today();
        $count = 0;

        $this->info("📅 Today's Date: " . $today->format('Y-m-d'));

        $hrms = Hrm::whereNotNull('insp_date')->get();

        foreach ($hrms as $hrm) {
            $inspDate = Carbon::parse($hrm->insp_date)->startOfDay();
            $reminderDate = $inspDate->copy()->addMonth();

            $this->info("🔍 Checking Inspection for: {$hrm->name}");
            $this->info("   - Insp Date: {$inspDate->format('Y-m-d')} | Reminder Date: {$reminderDate->format('Y-m-d')}");

            if ($reminderDate->isSameDay($today)) {

                   // Whatsapp intergeration
                $whatsappTo = $hrm->cell;
                if ($whatsappTo) {
                    app(WhatsAppNotificationManager::class)->sendInspectionFollowUpReminder(
                        to: $whatsappTo,
                        hrmName: $hrm->name,
                        inspection_date: Carbon::parse($hrm->insp_date)->format('d M Y'),
                        userModel: $hrm
                    );
                    Log::info('Look Back Reminder WhatsApp sent to: ' . $whatsappTo);
                }

                Mail::to($hrm->email)->send(new InspectionFollowupReminderMail($hrm));
                Mail::to('Erp.piffers@gmail.com')->send(new InspectionFollowupReminderMail($hrm));
                $this->info("✅ Reminder sent to {$hrm->name} ({$hrm->email})");
                ReminderNotification::create([
                  'user_id'     => $hrm->id,
                    'entity_type' => 'hrm',
                    'entity_id'   => $hrm->id,
                    'title'       => 'Inspections Follow Reminder',
                    'message'     => "Dear {$hrm->name}, your follow-up reminders {$hrm->insp_date}.",
                    'is_read'     => false,
                ]);
                $count++;
            } else {
                $this->warn("❌ Not today. Skipping...");
            }
        }

        $this->info("🎯 Total Follow-up Reminders Sent: {$count}");
    }
}
