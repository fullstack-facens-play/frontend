<?php

namespace App\Domain\Interfaces\Services;

use App\Domain\Model\Services\ConfigModal;

interface IAlertService 
{
    public function showConfirmModal(ConfigModal $config);
}