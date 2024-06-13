<?php

namespace App\DataAccess;

use App\DataAccess\DalBase;
use App\DataAccess\Interfaces\IViewedClassDal;
use App\Domain\Model\Entities\ViewedClass;

class ViewedClassDal extends DalBase implements IViewedClassDal
{
    public function __construct()
    {
        parent::__construct(new ViewedClass());
    }
}