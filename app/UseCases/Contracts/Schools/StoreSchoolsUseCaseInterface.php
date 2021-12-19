<?php

namespace App\UseCases\Contracts\Schools;

use Illuminate\Http\Request;

interface StoreSchoolsUseCaseInterface
{
    public function handle(Request $request):bool;
}
