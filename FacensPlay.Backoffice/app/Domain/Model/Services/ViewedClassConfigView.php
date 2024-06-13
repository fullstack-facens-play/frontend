<?php

namespace App\Domain\Model\Services;

use App\Domain\Model\Entities\ViewedClass;

class ViewedClassConfigView extends ConfigView
{
    public $viewedClass;
    public $studentSelect2Config;
    public $classRoomSelect2Config;

    public function __construct(string $path, ViewedClass $viewedClass = null, Select2Config $studentSelect2Config = null, Select2Config $classRoomSelect2Config = null)
    {
        parent::__construct($path);

        $this->viewedClass = $viewedClass;
        $this->studentSelect2Config = $studentSelect2Config;
        $this->classRoomSelect2Config = $classRoomSelect2Config;
    }
}