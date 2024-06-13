<?php

namespace App\Domain\Factories;

use App\Domain\Factories\FactoryBase;
use App\Domain\Interfaces\Factories\IViewedClassFactory;
use App\Domain\Model\Entities\ViewedClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ViewedClassFactory extends FactoryBase implements IViewedClassFactory
{
    public function __construct()
    {
        parent::__construct();
    }

    public function mapToModel(Request $requestBase)
    {
        $viewedClassModel = new ViewedClass();

        $viewedClassModel->is_watched = $requestBase->input('is_watched');
        $viewedClassModel->student_id = $requestBase->input('student_id');
        $viewedClassModel->class_room_id = bcrypt($requestBase->input('class_room_id'));
        
        return $viewedClassModel;
    }

    public function mapUpdate(Model $entityNew, Model $entityOld)
    {
        $entityOld->is_watched = $entityNew->is_watched;
        $entityOld->student_id = $entityNew->student_id;
        $entityOld->class_room_id = $entityNew->class_room_id;

        return $entityOld;   
    }
}