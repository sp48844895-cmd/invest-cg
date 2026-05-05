<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin user already exists
        $adminExists = User::where('email', 'admin@investorconnect.cg.gov.in')->exists();

        if (!$adminExists) {
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@investorconnect.cg.gov.in',
                'password' => Hash::make('Admin@123'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]);

            $this->command->info('Admin user created successfully!');
            $this->command->info('Email: admin@investorconnect.cg.gov.in');
            $this->command->info('Password: Admin@123');
            $this->command->warn('Please change the password after first login!');
        } else {
            $this->command->info('Admin user already exists.');
        }
    }
}





