<?php

namespace App\Domain\Model\Services;

use App\Domain\Model\Entities\ClassRoom;

class ClassroomConfigView extends ConfigView
{
    public $classRoom;
    public $courseSelect2Config;

    public function __construct(string $path, ClassRoom $classRoom = null, Select2Config $courseSelect2Config = null)
    {
        parent::__construct($path);

        $this->classRoom = $classRoom;
        $this->courseSelect2Config = $courseSelect2Config;
    }
}