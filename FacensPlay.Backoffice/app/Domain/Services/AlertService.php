<?php

namespace App\Domain\Services;

use App\Domain\Interfaces\Services\IAlertService;
use App\Domain\Models\Services\ConfigModal;

class AlertService implements IAlertService
{
    public function showConfirmModal(ConfigModal $config)
    {
        return view('components/common/modal/confirm/confirm', compact('config'));
    }
}