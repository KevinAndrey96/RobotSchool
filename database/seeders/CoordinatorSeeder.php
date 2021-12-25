<?php

namespace Database\Seeders;

use App\Models\Coordinator;
use App\Models\User;
use Illuminate\Database\Seeder;

class CoordinatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'coordinator';
        $user->email = 'coordinator@coordinator.com';
        $user->phone = '5464345';
        $user->password = bcrypt('coordinator');
        $user->role = 'Coordinator';
        $user->is_enable = 1;
        $user->save();
        $user = User::where('email', 'like', 'coordinator@coordinator.com')->first();
        $coordinator = new Coordinator();
        $coordinator->user_id = $user->id;
        $coordinator->school_id = 1;
        $coordinator->save();
        $user->assignrole('Coordinator');
    }
}
