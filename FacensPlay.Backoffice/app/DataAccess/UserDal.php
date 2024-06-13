<?php

namespace App\DataAccess;

use App\DataAccess\DalBase;
use App\DataAccess\Interfaces\IUserDal;
use App\User;

class UserDal extends DalBase implements IUserDal
{
    public function __construct()
    {
        parent::__construct(new User());
    }
}