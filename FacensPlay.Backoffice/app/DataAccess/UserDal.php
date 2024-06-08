<?php

namespace App\Dal;

use App\DataAccess\DalBase;
use App\DataAccess\IUserDal;
use App\User;

class UserDal extends DalBase implements IUserDal
{
    public function __construct()
    {
        parent::__construct(new User());
    }
}