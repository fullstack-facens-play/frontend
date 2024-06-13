<?php

namespace App\Domain\Services;

use App\Domain\Enum\AttributeBehavior;
use App\Common\Helpers\LogHelper;
use App\DataAccess\DalBase;
use App\Domain\Enum\HttpMethod;
use App\Domain\Factories\FactoryBase;
use App\Domain\Filter\FilterBase;
use App\Domain\Interfaces\Services\IServiceBase;
use App\Domain\Model\Services\ConfigModal;
use App\Domain\Model\Services\ConfigView;
use App\Domain\Validators\ValidatorBase;
use Illuminate\Http\Request;

abstract class ServiceBase implements IServiceBase
{
    protected $dalBase;
    protected $factoryBase;
    protected $validatorBase;
    protected $alertService;

    public function __construct(DalBase $dal, FactoryBase $factory, ValidatorBase $validator)
    {
        $this->dalBase = $dal;
        $this->factoryBase = $factory;
        $this->validatorBase = $validator;

        $this->alertService = new AlertService();
    }

    public function index(ConfigView $config = null)
    {
        if (!isset($config)) $config = new ConfigView("");

        return view($config->path, compact('config'));
    }

    public function create(ConfigView $config = null)
    {
        if (!isset($config)) $config = new ConfigView("");

        return view($config->path, compact('config'));
    }

    public function edit($id, ConfigView $config = null)
    {
        if (!isset($config)) $config = new ConfigView("");

        return view($config->path, compact('config'));
    }

    public function show($id, ConfigView $config = null)
    {
        if (!isset($config)) $config = new ConfigView("");

        return view($config->path, compact('config'));
    }

    public function store(Request $request)
    {
        $this->validatorBase->executeValidation($request);

        $entityNew = $this->factoryBase->mapToModel($request);
        
        return $this->dalBase->save($entityNew);
    }

    public function update(Request $request, $id)
    {
        $this->validatorBase->executeValidation($request, $id);

        $entityOld = $this->dalBase->GetById($id);
        $entityNew = $this->factoryBase->mapToModel($request);

        if (isset($entityOld))
        {
            $entityOld = $this->factoryBase->mapUpdate($entityNew, $entityOld);
        }

        return $this->dalBase->save($entityOld);
    } 

    public function getAll()
    {
        return $this->dalBase->getAll();
    }

    public function getById($id)
    {
        $item = $this->dalBase->getById($id);
        return $this->factoryBase->mapToView($item);
    }

    public function getAllPaging()
    {
        $items = $this->dalBase->getAllPaging();
        return $this->factoryBase->mapListToView($items);
    }

    public function delete($id, $routeChild)
    {
        LogHelper::LogInformation("delete id: " . $id . " for route " . $routeChild);

        if ($id == AttributeBehavior::$destroyAll)
        {
            return $this->alertService->showConfirmModal(
                new ConfigModal(
                    $routeChild,
                    HttpMethod::$delete,
                    __("general.delete_confirmation_all")
                )
            );
        }

        $model = $this->dalBase->getById($id);

        if (isset($model))
        {
            LogHelper::LogInformation("Iniciando rotina alertService");
            return $this->alertService->showConfirmModal(
                    new ConfigModal(
                        $routeChild,
                        HttpMethod::$delete,
                        __("general.delete_confirmation") . " " . $model->name . "?"
                    )
            );
        }
        else
        {
            LogHelper::LogInformation("Não trouxe nada com base no id " . $id . " for route " . $routeChild);
        }
    }

    public function destroy($id)
    {
        if ($id == AttributeBehavior::$destroyAll)
        {
            $this->destroyAll();
        }
        else
        {
            $entity = $this->dalBase->getById($id);
            $this->dalBase->destroy($entity);
        }

    }

    public function destroyAll()
    {
        $this->dalBase->destroyAll();
    }

    public function getByCustomFilters(FilterBase $filter)
    {
        return $this->dalBase->getByCustomFilters($filter);
    }

    public function importFromFile(Request $request, string $callbackRoute = 'index')
    {
        return view($callbackRoute);
    }
}