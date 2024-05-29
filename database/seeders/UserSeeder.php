<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Y%F3dTyL')
        ]);

        $admin->assignRole('admin');

        $worker = User::create([
            'name' => 'worker',
            'email' => 'worker@worker.com',
            'password' => Hash::make('B76q@DPC')
        ]);

        $worker->assignRole('worker');

    }
}
