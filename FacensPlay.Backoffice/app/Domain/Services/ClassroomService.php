<?php

namespace App\Domain\Services;

use App\DataAccess\ClassroomDal;
use App\Domain\Factories\ClassroomFactory;
use App\Domain\Interfaces\Services\IClassroomService;
use App\Domain\Model\Entities\ClassRoom;
use App\Domain\Model\Services\ClassroomConfigView;
use App\Domain\Model\Services\ConfigView;
use App\Domain\Model\Services\CourseConfigView;
use App\Domain\Model\Services\Select2Config;
use App\Domain\Validators\ClassroomValidator;
use Illuminate\Http\Request;

class ClassroomService extends ServiceBase implements IClassroomService
{

    private $courseService;
    public function __construct()
    {
        parent::__construct(new ClassroomDal(), new ClassroomFactory(), new ClassroomValidator());

        $this->courseService = new CourseService();
    }

    public function create(ConfigView $config = null)
    {
        if (!isset($config))
        {
            $config = new ClassroomConfigView
            (
                'components/classroom/create'
                ,
                new ClassRoom()
                ,
                new Select2Config
                (
                    $this->courseService->getAll(),
                    null,
                    __("general.course.title"),
                    'course_id',
                    'course_id',
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
            $classRoom = $this->dalBase->getById($id);

            $config = new ClassroomConfigView
            (
                'components/classroom/edit'
                ,
                $classRoom
                ,
                new Select2Config
                (
                    $this->courseService->getAll(),
                    $classRoom->course_id,
                    __("general.course.title"),
                    'course_id',
                    'course_id',
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
            $classRoom = $this->dalBase->getById($id);

            $config = new CourseConfigView
            (
                'components/classroom/show'
                ,
                $classRoom
            );
        }

        return parent::show($id, $config);
    }
}
