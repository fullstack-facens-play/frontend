<?php

namespace App\Domain\Model\Services;

use App\Domain\Model\Entities\Course;

class CourseConfigView extends ConfigView
{
    public $course;
    public function __construct(string $path, Course $course)
    {
        parent::__construct($path);

        $this->course = $course;
    }
}