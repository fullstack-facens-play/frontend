<?php

namespace App\Domain\Interfaces\Services;

use App\Domain\Models\Services\ConfigModal;

interface IAlertService 
{
    public function showConfirmModal(ConfigModal $config);
}