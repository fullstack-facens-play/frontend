<?php

namespace App\Common\Helpers;

class UriHelper
{
    public static function getCreate(string $resourceName = "")
    {
        return env('APP_URL') . $resourceName;
    }

    public static function getEdit(string $resourceName, string $id)
    {
        return env('APP_URL') . $resourceName . "/" . $id;   
    }

    public static function getCopyUrl(string $resourceName, string $id)
    {
        return env('APP_URL') . $resourceName . "/copy/" . $id; 
    }

    public static function getDisplayUrl(string $unitUrl, string $displayUrl)
    {
        return env('WEBAPP_URL') . '/tv/'. $unitUrl . '/' . $displayUrl;
    }

    public static function getUploadChunkUrl(string $resourceName)
    {
        return env('APP_URL') . $resourceName . "/uploadChunk";
    }

    public static function getExportUrl(string $resourceName)
    {
        return env('APP_URL') . $resourceName . "/export";
    }

    public static function getImportUrl(string $resourceName)
    {
        return env('APP_URL') . $resourceName . "/import";
    }

    public static function getFileModelUrl()
    {
        return env('APP_URL') . "storage/static/employee-import-model-deheus.xlsx";
    }
}