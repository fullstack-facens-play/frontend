<?php

namespace App\Domain\Models\Http;

class HttpResponseBase
{

    public static function getApiResponse($serviceResult)
    {
        $status = $serviceResult == null ? 204 : 200;

        return response()->json(collect([
            "response" => $status,
            "data" => $serviceResult
        ]), $status);     
    } 
}