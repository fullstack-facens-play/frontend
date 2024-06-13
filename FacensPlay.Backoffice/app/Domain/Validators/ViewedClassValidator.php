<?php

namespace App\Domain\Validators;

use App\Domain\Interfaces\Validators\IViewedClassValidator;
use Illuminate\Http\Request;

class ViewedClassValidator extends ValidatorBase implements IViewedClassValidator
{
    public function __construct()
    {  
        parent::__construct();
        $this->validatorConfig->on('viewedclasses');
    }

    public function executeValidation(Request $request, $id = null)
    {
        $this->validatorConfig
             ->exclusiveTo($id)
             ->add('is_checked', 'required')
             ->add('student_id', 'required')
             ->add('class_room_id', 'required');

        parent::executeValidation($request, $id);
    }
}
