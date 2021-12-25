<?php

namespace App\UseCases\Contracts\Teachers;

use App\Models\User;

interface StoreTeachersUseCaseInterface
{
    public function handle(string $name, string $email, string $phone, int $school_id, string $password, bool $is_enable): bool;
}
