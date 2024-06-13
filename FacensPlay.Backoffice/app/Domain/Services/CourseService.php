<?php

namespace App\Domain\Services;

use App\DataAccess\CourseDal;
use App\Domain\Interfaces\Services\ICourseService;
use App\Domain\Factories\CourseFactory;
use App\Domain\Model\Entities\Course;
use App\Domain\Model\Services\ConfigView;
use App\Domain\Model\Services\CourseConfigView;
use App\Domain\Validators\CourseValidator;
use Illuminate\Http\Request;

class CourseService extends ServiceBase implements ICourseService
{

    public function __construct()
    {
        parent::__construct(new CourseDal(), new CourseFactory(), new CourseValidator());
    }

    public function create(ConfigView $config = null)
    {
        if (!isset($config))
        {
            $config = new CourseConfigView
            (
                'components/course/create'
                ,
                new Course()
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
            $course = $this->dalBase->getById($id);

            $config = new CourseConfigView
            (
                'components/course/edit'
                ,
                $course
            );
        }

        return parent::edit($id, $config);
    }

    public function show($id, ConfigView $config = null)
    {
        if (!isset($config))
        {
            $course = $this->dalBase->getById($id);

            $config = new CourseConfigView
            (
                'components/course/show'
                ,
                $course
            );
        }

        return parent::show($id, $config);
    }
}
