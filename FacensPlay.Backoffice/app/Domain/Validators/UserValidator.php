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
             ->exclusiveTo($id)
             ->useCommonValidation()
             ->add('email', 'required|min:3|max:50|unique:users,email,'.$id)
             ->add('password', 'required|min:8|same:repeat_password')
             ->add('repeat_password', 'required|min:8|same:password');

        parent::executeValidation($request, $id);
    }
}
