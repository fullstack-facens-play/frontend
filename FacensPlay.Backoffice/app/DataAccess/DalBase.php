<?php

namespace App\DataAccess;

use App\DataAccess\Interfaces\IDalBase;
use App\Domain\Filter\FilterBase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DalBase implements IDalBase
{
    protected $modelEntity;
    protected $entityName;
    protected $pageIndex = 50000;

    public function __construct(Model $modelEntity, string $entityName = null)
    {
        $this->modelEntity = $modelEntity;
        $this->entityName = $entityName;
    }
    public function getAll()
    {
        return $this->modelEntity::all();
    }

    public function getById($id)
    {
        return $this->modelEntity::find($id);
    }

    public function save(Model $model)
    {
        $this->modelEntity = $model;
        $this->modelEntity->save();
        return $this->modelEntity;
    }

    public function destroy(Model $model)
    {
        $this->modelEntity = $model;
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->modelEntity->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return $this->modelEntity;
    }

    public function destroyAll()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->modelEntity->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }

    public function getAllPaging()
    {
        return $this->modelEntity::paginate($this->pageIndex);
    }

    public function getByFilters(FilterBase $filterBase)
    {
    }

    public function getByCustomFilters(FilterBase $filterBase)
    {
        $this->getByFilters($filterBase);
        return $this->modelEntity->get();
    }
}