<?php

namespace App\Domain\Services;

use Add\Domain\Interfaces\Services\IUserService;
use App\Dal\UserDal;
use App\Domain\Factories\UserFactory;
use App\Domain\Validators\UserValidator;

class UserService extends ServiceBase implements IUserService
{

    protected $statusService;
    protected $displayService;

    public function __construct()
    {
        parent::__construct(new UserDal(), new UserFactory(), new UserValidator());
    }
}
