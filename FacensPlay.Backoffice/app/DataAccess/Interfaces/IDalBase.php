<?php 

namespace App\DataAccess\Interfaces;

use App\Domain\Filter\FilterBase;
use Illuminate\Database\Eloquent\Model;

interface IDalBase
{
    public function getAll();

    public function getById($id);
    
    public function save(Model $model);

    public function destroy(Model $model);

    public function destroyAll();

    public function getAllPaging();

    public function getByFilters(FilterBase $filterBase);

    public function getByCustomFilters(FilterBase $filterBase);
}