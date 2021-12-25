<?php

namespace App\Repositories\Contracts\Teachers;

use App\Models\User;

interface TeachersRepositoryInterface
{
    public function saveTeacher(User $user, $school_id) : bool;
}
