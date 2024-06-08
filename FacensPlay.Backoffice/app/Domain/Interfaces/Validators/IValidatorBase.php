<?php

namespace App\Domain\Interfaces\Validators;

use Illuminate\Http\Request;

interface IValidatorBase
{
    public function executeValidation(Request $request, $id = null);
}