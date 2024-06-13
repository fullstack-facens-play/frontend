<?php

namespace App\Domain\Validators;

use App\Domain\Interfaces\Validators\IClassroomValidator;
use Illuminate\Http\Request;

class ClassroomValidator extends ValidatorBase implements IClassroomValidator
{
    public function __construct()
    {  
        parent::__construct();
        $this->validatorConfig->on('class_rooms');
    }

    public function executeValidation(Request $request, $id = null)
    {
        $this->validatorConfig
             ->exclusiveTo($id)
             ->add('title', 'required|min:3|max:50|unique:class_rooms,title,'.$id)
             ->add('duration', 'required|min:3')
             ->add('video_src', 'required|min:3');

        parent::executeValidation($request, $id);
    }
}
