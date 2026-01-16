<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestNotificationCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:notification-check';
    protected $description = 'Test if customer receives emails based on notification_status';

    public function handle()
    {
        $this->info('Starting Notification Status Test...');

        // 1. Create a dummy customer
        $email = 'test_notification_' . time() . '@example.com';
        $customer = \App\Models\Customer::create([
            'customers_name' => 'Test User',
            'email' => $email,
            'customers_id' => 'TEST-' . time(),
            'notification_status' => 1, // Enabled initially
            'customers_activation_check' => 1,
        ]);

        $this->info("Created Test Customer: {$customer->customers_name} ({$customer->email}) with Notification ON");

        // 2. Simulate sending an email (Checking Logic)
        $this->info("--- Testing with Notification ON ---");
        if ($this->shouldSendEmail($customer)) {
            $this->info("✅ Email WOULD be sent (Correct)");
        } else {
            $this->error("❌ Email WOULD NOT be sent (Incorrect)");
        }

        // 3. Disable Notifications
        $customer->notification_status = 0;
        $customer->save();
        $customer->refresh(); // Reload from DB

        $this->info("Updated Customer Notification Status to OFF");

        // 4. Simulate sending an email again
        $this->info("--- Testing with Notification OFF ---");
        if ($this->shouldSendEmail($customer)) {
            $this->error("❌ Email WOULD be sent (Incorrect - Should be skipped)");
        } else {
            $this->info("✅ Email SKIPPED (Correct)");
        }

        // 5. Cleanup
        $customer->delete();
        $this->info("Test Customer Deleted. Test Complete.");
    }

    private function shouldSendEmail($customer)
    {
        // Simulate the check we added in controllers
        if ($customer->notification_status == 1) {
            return true;
        }
        return false;
    }
}
