<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $teacher = new Teacher();
        $user->name = 'Teacher';
        $user->email = 'teacher@teacher.com';
        $user->phone = '4537895';
        $user->is_enable = 1;
        $user->role = 'Teacher';
        $user->password = bcrypt('teacher');
        $user->save();
        $teacher->school_id = 1;
        $teacher->user_id = $user->id;
        $teacher->save();
    }
}
