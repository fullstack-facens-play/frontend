<?php

namespace App\Domain\Validators;

use App\Domain\Interfaces\Validators\IValidatorBase;
use App\Domain\Models\Validators\ValidatorConfigBase;
USE App\Domain\Models\Validators\ValidatorConfigMessages;
use Illuminate\Http\Request;

abstract class ValidatorBase implements IValidatorBase
{
    public $validatorConfig;

    public function __construct()
    {      
        $this->validatorConfig = new ValidatorConfigBase();
    }

    public function executeValidation(Request $request, $id = null)
    {
        //$validator = Validator::make($request->all(), $this->validatorConfig->getValidation(), ValidatorConfigMessages::$messages);
        //Log::info(print_r($validator,true));
        //return $validator;
        $request->validate($this->validatorConfig->getValidation(), ValidatorConfigMessages::$messages);   
    }  
}