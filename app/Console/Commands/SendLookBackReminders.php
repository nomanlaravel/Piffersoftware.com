<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Hrm;
use Illuminate\Console\Command;
use App\Mail\LookBackReminderMail;
use App\Models\ReminderNotification;
use Illuminate\Support\Facades\Mail;
use Log;
use App\Services\WhatsApp\WhatsAppNotificationManager;


class SendLookBackReminders extends Command
{
    protected $signature = 'send:lookback-reminders';
    protected $description = 'Send reminders as per Look Back Periods and Frequencies';

    public function handle()
    {
        $today = Carbon::today();
        $count = 0;

        $hrms = Hrm::all();                                              

        foreach ($hrms as $hrm) {
            // loop through 1 to 14
            for ($i = 1; $i <= 14; $i++) {
                $lookBackField = "look_back{$i}";                                                                                                                                  
                $frequencyField = "frequency{$i}";
                $notesField = "notes{$i}";

                $lookBackDate = $hrm->$lookBackField;
                $frequency = $hrm->$frequencyField;
                $notes = $hrm->$notesField;

                if ($lookBackDate && $frequency) {
                    $lookBackDate = Carbon::parse($lookBackDate);

                    $due = false;

                    // check by frequency
                    switch (strtolower($frequency)) {
                        case 'daily':
                            $due = true; // every day after lookBackDate
                            break;
                        case 'weekly':
                            $due = $today->isSameDay($lookBackDate) || $today->dayOfWeek == $lookBackDate->dayOfWeek;
                            break;
                        case 'monthly':
                            $due = $today->day == $lookBackDate->day;
                            break;
                        case 'yearly':
                            $due = $today->isSameDay($lookBackDate);
                            break;
                        default: // one-time reminder
                            $due = $today->isSameDay($lookBackDate);
                            break;
                    }

                    if ($due) {
                        ReminderNotification::create([
                            'user_id'     => $hrm->id,
                            'entity_type' => 'hrm',
                            'entity_id'   => $hrm->id,
                            'title'       => "Look Back Reminder {$i}",
                            'message'     => "Dear {$hrm->name}, Reminder {$i} triggered. Notes: {$notes}",
                            'is_read'     => false,
                        ]);

                        // Whatsapp intergeration
                $whatsappTo = $hrm->cell;
                if ($whatsappTo) {
                    app(WhatsAppNotificationManager::class)->sendLookBackReminder(
                        to: $whatsappTo,
                        hrmName: $hrm->name,
                        count: $i,
                        notes: $notes,
                        userModel: $hrm
                    );
                    Log::info('Look Back Reminder WhatsApp sent to: ' . $whatsappTo);
                }

                        if ($hrm->email) { // make sure HRM has email
                          Mail::to($hrm->email)->send(new LookBackReminderMail($hrm, $notes, $i));
                          }
                         // send copy to admin
                         Mail::to('Erp.piffers@gmail.com')->send(new LookBackReminderMail($hrm, $notes, $i)); 
                        $this->info("✅ Reminder {$i} created for {$hrm->name}");
                        $count++;
                    }
                }
            }
        }

        $this->info("🎯 Total Look Back Reminders Created Today: {$count}");
    }
}   