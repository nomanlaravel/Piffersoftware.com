<?php

namespace Database\Seeders;

use App\Models\WhatsappTemplate;
use Illuminate\Database\Seeder;

class WhatsappTemplateSeeder extends Seeder
{
    public function run(): void
    {
        $templates = [
            ['name' => 'trigger_feedbacks_flow', 'label' => 'WhatsApp Survey Flow', 'description' => 'Sends the standard customer feedback/survey flow'],
            ['name' => 'customerwelcome', 'label' => 'Customer Welcome', 'description' => 'Welcome message for new customers'],
            ['name' => 'welcome_message_new', 'label' => 'Generic Session Opener', 'description' => 'Generic welcome/session opener template'],
            ['name' => 'contract_expiry', 'label' => 'Contract Expiry Reminder', 'description' => 'Notifies customers about upcoming contract expiry'],
            ['name' => 'validity_reminder', 'label' => 'Validity Reminder', 'description' => 'Reminds customers about validity deadlines'],
            ['name' => 'look_back_reminders', 'label' => 'Look Back Reminder', 'description' => 'Follow-up look back reminder for customers'],
            ['name' => 'customer_meeting_reminder', 'label' => 'Meeting Reminder', 'description' => 'Upcoming meeting reminder template'],
        ];

        foreach ($templates as $template) {
            WhatsappTemplate::updateOrCreate(
                ['name' => $template['name']],
                array_merge($template, ['status' => 'approved'])
            );
        }
    }
}
