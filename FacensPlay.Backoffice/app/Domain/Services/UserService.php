<?php

namespace App\Domain\Services;

use App\Domain\Interfaces\Services\IUserService;
use App\DataAccess\UserDal;
use App\Domain\Factories\UserFactory;
use App\Domain\Model\Services\ConfigView;
use App\Domain\Model\Services\UserConfigView;
use App\Domain\Validators\UserValidator;
use App\User;
use Illuminate\Http\Request;

class UserService extends ServiceBase implements IUserService
{
    
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
                ,
                new User()
            );
        }

        return parent::create($config);
    }

    public function store(Request $request)
    {   
        return parent::store($request);
    }

    public function edit($id, ConfigView $config = null)
    {
        if (!isset($config))
        {
            $user = $this->dalBase->getById($id);

            $config = new UserConfigView
            (
                'components/user/edit'
                ,
                $user
            );
        }

        return parent::edit($id, $config);
    }

    public function show($id, ConfigView $config = null)
    {
        if (!isset($config))
        {
            $user = $this->dalBase->getById($id);

            $config = new UserConfigView
            (
                'components/user/show'
                ,
                $user
            );
        }

        return parent::show($id, $config);
    }
}
