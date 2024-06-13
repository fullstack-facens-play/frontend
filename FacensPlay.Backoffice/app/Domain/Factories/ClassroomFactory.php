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

        $classRoomModel->title = $requestBase->input('title');
        $classRoomModel->duration = $requestBase->input('duration');
        $classRoomModel->description = bcrypt($requestBase->input('description'));
        $classRoomModel->video_src = $requestBase->input('video_src');
        
        return $classRoomModel;
    }

    public function mapUpdate(Model $entityNew, Model $entityOld)
    {
        $entityOld->title = $entityNew->title;
        $entityOld->duration = $entityNew->duration;
        $entityOld->description = $entityNew->description;
        $entityOld->video_src = $entityNew->video_src;

        return $entityOld;   
    }
}