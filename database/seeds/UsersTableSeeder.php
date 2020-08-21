<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'David Flores',
            'email' => 'david@enlace.com',
            'email_verified_at' => now(),
            'identity_card' => '12345678', // 79907610
            'address' => 'Calle 43 325 Juan Pablo II',
            'phone' => '9991992696',
            'role' => 'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        factory(User::class, 50)->create();
    }
}
