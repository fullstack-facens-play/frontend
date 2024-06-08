<?php

namespace App\Domain\Interfaces\Factories;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

interface IFactoryBase
{
    public function mapToModel(Request $requestBase);

    public function mapUpdate(Model $entityNew, Model $entityOld);

    public function mapListToView($listItems);

    public function mapToView(Model $item);
}