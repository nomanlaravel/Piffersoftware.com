<?php
namespace Database\Seeders;

use App\Mail\RegisterGuardEmail;
use App\Models\Customer;
use App\Models\Hrm;
use Illuminate\Database\Seeder;
use Mail;

class AssociateGuardToCustomer3960Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Find the customer with customers_id = '3960'
        $customer = Customer::where('id', '3960')->first();

        // 2. If it doesn't exist, create it
        if (! $customer) {
            $customer = Customer::create([
                'customers_id'               => '3960',
                'customers_name'             => 'Dummy Customer 3960', // Dummy name
                'customers_activation_check' => 1,
                // Add other required fields if any (most seem nullable based on migration inspection,
                // but checking Customer model fillable, only validation usually enforces otherwise)
            ]);
            $this->command->info('Created new customer with ID 3960.');
        } else {
            $this->command->info('Found existing customer with ID 3960: ' . $customer->customers_name);
        }

        // 3. Create a dummy Hrm (Guard) and assign it to this customer
        // We can create a new one to ensure 1-to-1 assignment for this test
        // Determine the next ID manually since auto-increment is missing
        $maxId  = Hrm::max('id');
        $nextId = $maxId ? $maxId + 1 : 1;

        $guard = Hrm::create([
            'id'          => $nextId,
            'name'        => 'Dummy Guard for 3960',
            'fname'       => 'Guard Father',
            'email'       => 'coding.ata@gmail.com',
            'cnic'        => '00000-0000000-0',
            'employee_no' => 'DG-3960',
            'client_id'   => $customer->id,             // This is the foreign key relationship
            'client_name' => $customer->customers_name, // Redundant but present in schema
            'activation'  => 1,                         // Assuming active
        ]);

        Mail::to($guard->email)->send(
            new RegisterGuardEmail(
                $guard->name,             // guard's name
                'Guard',                  // position
                $guard->start_date ?? '', // start date
                route('login')            // login URL
            )
        );
        $this->command->info('Created dummy guard (ID: ' . $guard->id . ') and assigned to customer 3960.');
    }
}
