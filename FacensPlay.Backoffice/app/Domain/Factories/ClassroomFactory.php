<?php

namespace App\Domain\Factories;

use App\Domain\Factories\FactoryBase;
use App\Domain\Interfaces\Factories\IClassroomFactory;
use App\Domain\Model\Entities\ClassRoom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ClassroomFactory extends FactoryBase implements IClassroomFactory
{
    public function __construct()
    {
        parent::__construct();
    }

    public function mapToModel(Request $requestBase)
    {
        $classRoomModel = new ClassRoom();

        $classRoomModel->name = $requestBase->input('name');
        $classRoomModel->duration = $requestBase->input('duration');
        $classRoomModel->description = $requestBase->input('description');
        $classRoomModel->video_src = $requestBase->input('video_src');
        $classRoomModel->course_id = $requestBase->input('course_id');

        return $classRoomModel;
    }

    public function mapUpdate(Model $entityNew, Model $entityOld)
    {
        $entityOld->name = $entityNew->name;
        $entityOld->duration = $entityNew->duration;
        $entityOld->description = $entityNew->description;
        $entityOld->video_src = $entityNew->video_src;
        $entityOld->course_id = $entityNew->course_id;

        return $entityOld;   
    }
}