<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersQty = 25;

        $admin = User::factory()->create(
            [
                'name' => 'Faustino Vasquez',
                'email' => 'fvasquez@local.com',
            ]
        );

        $admin->assignRole('Admin');

        $admin = User::factory()->create(
            [
                'name' => 'Sebastian Vasquez',
                'email' => 'svasquez@local.com',
            ]
        );

        $admin->assignRole('Almacenista');


        User::factory()->times($usersQty)->create();
    }
}
