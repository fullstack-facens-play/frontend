<?php

namespace App\Domain\Model\Validators; 

use Illuminate\Validation\Rule;

class ValidatorConfigBase {

    private $baseEntity;
    private $validatorRules = [];

    public function __construct()
    {
    }

    public function on($baseEntityName)
    {
        $this->baseEntity = $baseEntityName;
        return $this;
    }

    public function useCommonValidation($id = null)
    {
        $this->validatorRules += ["name" => 'required|min:3|max:50|unique:' . $this->baseEntity . ',name,' . $id];
        return $this;
    }

    public function useCommonValidationUpdate($id)
    {
        $this->validatorRules += [
            "name" => 'required|min:3|max:50', 
            Rule::unique($this->baseEntity)->ignore($id)];
        return $this;
    }

    public function add(string $propertyName, string $propertyConfig)
    {
        $this->validatorRules += [$propertyName => $propertyConfig . str_contains($propertyConfig, 'unique') ? $this->baseEntity : ""];
        return $this;
    }

    public function get()
    {
        return $this->validatorRules;
    }

    public function getValidation()
    {
        return $this->validatorRules;
    }
}