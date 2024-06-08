<?php

namespace App\Domain\Services;

use App\Domain\Interfaces\Services\IUserService;
use App\DataAccess\UserDal;
use App\Domain\Factories\UserFactory;
use App\Domain\Model\Services\ConfigView;
use App\Domain\Model\Services\UserConfigView;
use App\Domain\Validators\UserValidator;

class UserService extends ServiceBase implements IUserService
{

    protected $statusService;
    protected $displayService;

    public function __construct()
    {
        parent::__construct(new UserDal(), new UserFactory(), new UserValidator());
    }

    public function create(ConfigView $config = null)
    {
        if (!isset($config))
        {
            $config = new UserConfigView
            (
                'components/user/create'
            );
        }

        return parent::create($config);
    }
}
