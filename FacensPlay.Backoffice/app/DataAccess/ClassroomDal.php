<?php

namespace App\DataAccess;

use App\DataAccess\DalBase;
use App\DataAccess\Interfaces\IClassRoomDal;
use App\Domain\Model\Entities\ClassRoom;

class ClassroomDal extends DalBase implements IClassRoomDal
{
    public function __construct()
    {
        parent::__construct(new ClassRoom());
    }
}