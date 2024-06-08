<?php

namespace App\Domain\Factories;

use App\Domain\Factories\FactoryBase;
use App\Domain\Interfaces\Factories\IUserFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Common\Helpers\DatetimeHelper;
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
        $userModel->description = $requestBase->input('description');
        $userModel->status_id = $requestBase->input('status_id');
        $userModel->display_id = $requestBase->input('display_id');
        $userModel->order = $requestBase->input('order');
        $userModel->date_start = DatetimeHelper::formatToSave($requestBase->input('date_start'));
        $userModel->date_end = DatetimeHelper::formatToSave($requestBase->input('date_end'));
        
        return $userModel;
    }

    public function mapUpdate(Model $entityNew, Model $entityOld)
    {
        $entityOld->name = $entityNew->name;
        $entityOld->description = $entityNew->description;
        $entityOld->status_id = $entityNew->status_id;
        $entityOld->display_id = $entityNew->display_id;
        $entityOld->order = $entityNew->order;
        $entityOld->date_start = $entityNew->date_start;
        $entityOld->date_end = $entityNew->date_end;

        return $entityOld;   
    }
}