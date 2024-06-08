<?php

namespace App\Domain\Interfaces\Services;

use App\Domain\Filter\FilterBase;
use App\Domain\Models\Services\ConfigView;
use Illuminate\Http\Request;

interface IServiceBase
{
    public function index(ConfigView $config = null);

    public function create(ConfigView $config = null);

    public function edit($id, ConfigView $config = null);

    public function store(Request $request);
    
    public function update(Request $request, $id);

    public function delete($id, $routeChild);

    public function destroy($id);

    public function destroyAll();

    public function show($id, ConfigView $config = null);

    public function getAll();

    public function getById($id);

    public function getAllPaging();

    public function getByCustomFilters(FilterBase $filter);

    public function importFromFile(Request $request, string $callbackRoute = 'index');
}