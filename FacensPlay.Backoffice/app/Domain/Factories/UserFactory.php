<?php

namespace App\Domain\Factories;

use App\Domain\Factories\FactoryBase;
use App\Domain\Interfaces\Factories\IUserFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;

class UserFactory extends FactoryBase implements IUserFactory
{
    public function __construct()
    {
        parent::__construct();
    }

    public function mapToModel(Request $requestBase)
    {
        $userModel = new User();

        $userModel->name = $requestBase->input('name');
        $userModel->email = $requestBase->input('email');
        $userModel->password = bcrypt($requestBase->input('password'));
        
        return $userModel;
    }

    public function mapUpdate(Model $entityNew, Model $entityOld)
    {
        $entityOld->name = $entityNew->name;
        $entityOld->email = $entityNew->email;
        $entityOld->password = $entityNew->password;

        return $entityOld;   
    }
}