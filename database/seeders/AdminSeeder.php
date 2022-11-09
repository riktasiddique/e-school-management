<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [
                'name'       => 'Admin',
                'email'      => 'admin@gmail.com',
                'password'   => Hash::make( 12345678 ),
                'is_admin'   => 1,
                'created_at' => now()->toDateTimeString(),
            ],
        ];
        User::insert( $admin );
    }
}
