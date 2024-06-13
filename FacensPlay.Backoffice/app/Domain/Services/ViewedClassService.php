<?php

namespace App\Domain\Services;

use App\DataAccess\ViewedClassDal;
use App\Domain\Factories\ViewedClassFactory;
use App\Domain\Interfaces\Services\IViewedClassService;
use App\Domain\Model\Entities\ViewedClass;
use App\Domain\Model\Services\ClassroomConfigView;
use App\Domain\Model\Services\ConfigView;
use App\Domain\Model\Services\Select2Config;
use App\Domain\Model\Services\ViewedClassConfigView;
use App\Domain\Validators\ViewedClassValidator;
use Illuminate\Http\Request;

class ViewedClassService extends ServiceBase implements IViewedClassService
{

    private $userService;
    private $classRoomService;

    public function __construct()
    {
        parent::__construct(new ViewedClassDal(), new ViewedClassFactory(), new ViewedClassValidator());

        $this->userService = new UserService();
        $this->classRoomService = new ClassroomService();
    }

    public function create(ConfigView $config = null)
    {
        if (!isset($config))
        {
            $config = new ViewedClassConfigView
            (
                'components/viewedclass/create'
                ,
                new ViewedClass()
                ,
                new Select2Config
                (
                    $this->userService->getAll(),
                    null,
                    __("general.viewedclass.student"),
                    'student_id',
                    'student_id',
                    true
                )
                ,
                new Select2Config
                (
                    $this->classRoomService->getAll(),
                    null,
                    __("general.viewedclass.classroom"),
                    'class_room_id',
                    'class_room_id',
                    true
                )
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
            $viewedClass = $this->dalBase->getById($id);

            $config = new ViewedClassConfigView
            (
                'components/viewedclass/edit'
                ,
                $viewedClass
                ,
                new Select2Config
                (
                    $this->userService->getAll(),
                    $viewedClass->student_id,
                    __("general.viewedclass.student"),
                    'class_room_id',
                    'class_room_id',
                    true
                )
                ,
                new Select2Config
                (
                    $this->classRoomService->getAll(),
                    $viewedClass->class_room_id,
                    __("general.viewedclass.classroom"),
                    'class_room_id',
                    'class_room_id',
                    true
                )
            );
        }

        return parent::edit($id, $config);
    }

    public function show($id, ConfigView $config = null)
    {
        if (!isset($config))
        {
            $viewedClass = $this->dalBase->getById($id);

            $config = new ViewedClassConfigView
            (
                'components/viewedclass/show'
                ,
                $viewedClass
            );
        }

        return parent::show($id, $config);
    }
}
