<?php

namespace App\Domain\Validators;

use App\Domain\Interfaces\Validators\ICourseValidator;
use Illuminate\Http\Request;

class CourseValidator extends ValidatorBase implements ICourseValidator
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
             ->add('title', 'required|min:3|max:50|unique:courses,title,'.$id)
             ->add('duration', 'required|min:3');

        parent::executeValidation($request, $id);
    }
}
