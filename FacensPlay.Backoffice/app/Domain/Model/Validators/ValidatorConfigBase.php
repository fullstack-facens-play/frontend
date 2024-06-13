<?php

namespace App\Domain\Model\Validators;

use App\Common\Helpers\LogHelper;
use Illuminate\Validation\Rule;

class ValidatorConfigBase {

    private $baseEntity;
    private $validatorRules = [];
    private $currentId;

    public function __construct()
    {
    }

    public function on($baseEntityName)
    {
        $this->baseEntity = $baseEntityName;
        return $this;
    }

    public function exclusiveTo($id)
    {
        $this->currentId = $id;
        LogHelper::LogInformation("Current validation id: " . $this->currentId);
        return $this;
    }

    public function useCommonValidation()
    {
        $this->validatorRules += ["name" => 'required|min:3|max:50|unique:' . $this->baseEntity . ',name,' . $this->currentId];
        return $this;
    }

    public function add(string $propertyName, string $validationSpecification)
    {
        $this->validatorRules += [$propertyName => $validationSpecification];
        LogHelper::LogInformation("Checking user validation rules: " . implode($this->validatorRules));
        return $this;
    }

    public function get()
    {
        return $this->validatorRules;
    }

    public function getValidation()
    {
        LogHelper::LogInformation("Get validation array: " . implode($this->validatorRules));
        return $this->validatorRules;
    }
}