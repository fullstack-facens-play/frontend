<?php

namespace App\Domain\Validators;

use App\Domain\Interfaces\Validators\IUserValidator;
use Illuminate\Http\Request;

class UserValidator extends ValidatorBase implements IUserValidator
{
    public function __construct()
    {  
        parent::__construct();
        $this->validatorConfig->on('users');
    }

    public function executeValidation(Request $request, $id = null)
    {
        $this->validatorConfig
             ->useCommonValidation($id);

        parent::executeValidation($request, $id);
    }
}
