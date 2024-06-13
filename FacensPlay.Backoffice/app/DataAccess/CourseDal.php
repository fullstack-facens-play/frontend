<?php

namespace App\DataAccess;

use App\DataAccess\DalBase;
use App\DataAccess\Interfaces\ICourseDal;
use App\Domain\Model\Entities\Course;

class CourseDal extends DalBase implements ICourseDal
{
    public function __construct()
    {
        parent::__construct(new Course());
    }
}