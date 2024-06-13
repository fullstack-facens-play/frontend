<?php

namespace App\Domain\Factories;

use App\Domain\Factories\FactoryBase;
use App\Domain\Interfaces\Factories\ICourseFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Domain\Model\Entities\Course;

class CourseFactory extends FactoryBase implements ICourseFactory
{
    public function __construct()
    {
        parent::__construct();
    }

    public function mapToModel(Request $requestBase)
    {
        $courseModel = new Course();

        $courseModel->title = $requestBase->input('title');
        $courseModel->duration = $requestBase->input('duration');
        $courseModel->description = bcrypt($requestBase->input('description'));
        
        return $courseModel;
    }

    public function mapUpdate(Model $entityNew, Model $entityOld)
    {
        $entityOld->title = $entityNew->title;
        $entityOld->duration = $entityNew->duration;
        $entityOld->description = $entityNew->description;

        return $entityOld;   
    }
}