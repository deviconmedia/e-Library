<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Member;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Seeding for Users
        User::create([
            'name' => 'Superadmin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'level' => 'Admin',
            'status' => 'active'
        ]);
        User::create([
            'name' => 'Hilman Iconmedia',
            'email' => 'hilman@iconmedia.co.id',
            'password' => bcrypt('123'),
            'level' => 'Staff',
            'status' => 'active'
        ]);
        User::create([
            'name' => 'Efron Paduansi',
            'email' => 'efron@iconmedia.co.id',
            'password' => bcrypt('123'),
            'level' => 'Member',
            'status' => 'active'
        ]);

        //Seeding for Members
        Member::create([
            'email' => 'efron@iconmedia.co.id',
            'name' => 'Efron Paduansi',
            'pass' => bcrypt('123'),
            'status' => 'active'
        ]);
    }
}
