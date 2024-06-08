<?php

namespace App\Domain\Factories;

use App\Domain\Interfaces\Factories\IFactoryBase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Common\Helpers\DatetimeHelper;

abstract class FactoryBase implements IFactoryBase
{
    public function __construct()
    {
    }

    public function mapToModel(Request $requestBase)
    {
        $modelBase = new Model();
        return $modelBase;
    }

    public function mapUpdate(Model $entityNew, Model $entityOld)
    {
        return $entityOld;
    }

    public function mapListToView($listItems)
    {
        if (isset($listItems))
        {
            foreach ($listItems as $item)
            {
                $this->mapToView($item);
            }
        }
        
        return $listItems;
    }

    public function mapToView(Model $item)
    {
        if (isset($item))
        {
            if (isset($item->date_start))
                $item->date_start = DatetimeHelper::formatToView($item->date_start);

            if (isset($item->date_end))
                $item->date_end = DatetimeHelper::formatToView($item->date_end);

            if (isset($item->birthday))
                $item->birthday = DatetimeHelper::formatDateToView($item->birthday);
        }

        return $item;
    }
}