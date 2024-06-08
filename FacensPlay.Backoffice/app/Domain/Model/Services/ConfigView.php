<?php

namespace App\Domain\Models\Services;

use App\Common\Helpers\UriHelper;
use App\Domain\Enum\MediaType;

abstract class ConfigView 
{
    public $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }
}

class MultipleChoicesConfig
{
    public $items;

    public $selectedId;
    
    public $labelName;

    public $inputName;

    public $inputId;

    public $isRequired;

    public $isMultiple;

    public function __construct($items, $selectedId, $labelName, $inputName, $inputId, $isRequired, $isMultiple)
    {
        $this->items = $items;
        $this->selectedId = $selectedId;
        $this->labelName = $labelName;
        $this->inputName = $inputName;
        $this->inputId = $inputId;
        $this->isRequired = $isRequired;
        $this->isMultiple = $isMultiple;
    }
}

class Select2Config extends MultipleChoicesConfig
{
    public function __construct($items, $selectedId, $labelName, $inputName, $inputId, $isRequired, $isMultiple = false)
    {
        parent::__construct($items, $selectedId, $labelName, $inputName, $inputId, $isRequired, $isMultiple);
    }
}

class Select2ConfigItem
{
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}

class DatePickerInputConfig
{
    public $value;

    public $inputName;

    public $inputId;

    public $isRequired;

    public $labelName;

    public $isDatetimePicker;

    public $datePickerClassName;

    public function __construct(
        $value, 
        $inputName, 
        $inputId, 
        $isRequired, 
        $labelName,
        bool $isDatetimePicker = true)
    {
        $this->value = $value;
        $this->inputName = $inputName;
        $this->inputId = $inputId;
        $this->isRequired = $isRequired;
        $this->labelName = $labelName;
        $this->isDatetimePicker = $isDatetimePicker;

        $this->datePickerClassName = $this->isDatetimePicker ? "datetimepicker-input" : "datepicker-input";
    }
}

class FileUploadInputConfig
{
    public $value;

    public $inputName;

    public $inputId;

    public $isRequired;

    public $labelName;

    public $filePath;

    public $mediaType;

    public function __construct(
        $value, 
        $inputName, 
        $inputId, 
        $isRequired, 
        $labelName,
        $mediaType = null)
    {
        $this->value = $value;
        $this->inputName = $inputName;
        $this->inputId = $inputId;
        $this->isRequired = $isRequired;
        $this->labelName = $labelName;
        $this->filePath = isset($value) ? asset('storage/'.$value) : "";
        $this->mediaType = $mediaType ?? MediaType::$image;
    }
}

class FileUploadChunkInputConfig extends FileUploadInputConfig 
{

    public $uploadUri;

    public $allowedFileTypes;

    public $chunkSize;

    public function __construct(
        $value, 
        $inputName, 
        $inputId, 
        $isRequired, 
        $labelName,
        $resourceName,
        $mediaType = null,
        $allowedFileTypes = null,
        $chunkSize = null)
    {
        parent::__construct($value, $inputName, $inputId, $isRequired, $labelName, $mediaType);
        //$this->uploadUri = UriHelper::getUploadChunkUrl($resourceName);
        $this->allowedFileTypes = $allowedFileTypes ?? ['mp4'];
        $this->chunkSize = $chunkSize ?? 10*1024*1024;
    }

}

class ImportModalConfig
{
    public $modalTitle;
    public $routeAction;
    public $routeMethod;
    public $fileUploadInputConfig;

    public function __construct(
        string $modalTitle,
        string $routeAction, 
        string $routeMethod, 
        FileUploadInputConfig $fileUploadInputConfig
    )
    {
        $this->modalTitle = $modalTitle;
        $this->routeAction = $routeAction;
        $this->routeMethod = $routeMethod;
        $this->fileUploadInputConfig = $fileUploadInputConfig;
    }

}