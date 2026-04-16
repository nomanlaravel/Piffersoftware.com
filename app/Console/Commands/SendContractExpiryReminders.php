<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Mail\ContractExpiryReminder;
use App\Models\ReminderNotification;
use Illuminate\Support\Facades\Mail;
use App\Services\WhatsApp\WhatsAppNotificationManager;

class SendContractExpiryReminders extends Command
{
    protected $signature = 'send:contract-reminders';
    protected $description = 'Send email reminders to customers 1 month before contract ends';

    public function handle()
    {
        Log::info("Contract reminder command started at " . now());

        // Get the date one month from now (for the reminder)
        $targetDate = now()->addMonth()->toDateString();

        // Find customers whose contract end date is exactly one month from now
        $customers = Customer::where('notification_status', 1)
            ->whereDate('c_end_date', $targetDate)
            ->take(2) // For testing: only 2 customers
            ->get();

        $count = 0;

        foreach ($customers as $customer) {
            
        // Whatsapp intergeration
         $whatsappTo = !empty($customer->whatsapp_number) ? $customer->whatsapp_number : $customer->phone;
                        if (!empty($whatsappTo)) {
                            app(WhatsAppNotificationManager::class)->sendContractExpiry(
                                to: $whatsappTo,
                                customerName: $customer->customers_name,
                                contract_end_date: Carbon::parse($targetDate)->format('d M Y'),
                                userModel: $customer
                            );
                            Log::info('Contract Reminder WhatsApp sent to: ' . $whatsappTo);
                        }


            if ($customer->email) {
                // Send Email
                Log::info("Sending email to: " . $customer->email);
                Mail::to($customer->email)->send(new ContractExpiryReminder($customer));
                Mail::to('Erp.piffers@gmail.com')->send(new ContractExpiryReminder($customer));
                // Save Notification in DB
                ReminderNotification::create([
                    'user_id' => $customer->id,
                    'entity_type' => 'customer',
                    'entity_id' => $customer->id,
                    'title' => 'Contract Expiry Reminder',
                    'message' => "Dear {$customer->customer_name}, your contract will expire on {$customer->c_end_date} date.",
                    'is_read' => false,
                ]);
                $count++;
            } else {
                Log::info("No email found for customer: " . $customer->customer_name);
            }
        }

        $this->info("Reminders sent to {$count} customer(s).");
    }





}

