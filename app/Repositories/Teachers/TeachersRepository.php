<?php

namespace App\Repositories\Teachers;


use App\Models\Teacher;
use App\Models\User;
use App\Repositories\Contracts\Teachers\TeachersRepositoryInterface;

class TeachersRepository implements TeachersRepositoryInterface
{
    public function saveTeacher(User $user, $school_id) : bool
    {
        $user->save();
        $teacher = new Teacher();
        $teacher->school_id = $school_id;
        $teacher->user_id = $user->id;
        $teacher->save();
        $user->assignRole('Teacher');
        return true;
    }


}
