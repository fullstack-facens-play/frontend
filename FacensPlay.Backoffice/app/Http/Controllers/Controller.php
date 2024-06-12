<?php

namespace App\Http\Controllers;

use App\Domain\Filter\FilterBase;
use App\Domain\Models\Http\HttpResponseBase;
use App\Domain\Services\ServiceBase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $serviceBase;
    protected $resourceName;

    public function __construct(ServiceBase $serviceBase = null, $resourceName = null) {
        $this->serviceBase = $serviceBase;
        $this->resourceName = $resourceName;
    }

    public function getByCustomFilters(Request $request)
    {
        if (!isset($this->serviceBase))
            return response('ServiceBase não fornecido!', 500);

        $response = $this->serviceBase->getByCustomFilters(
            new FilterBase($request)
        );

        return HttpResponseBase::getApiResponse($response); 
    }

    public function import(Request $request)
    {
        return $this->serviceBase->importFromFile($request);
    }

    public function getOperationResult($responseModel)
    {
        if ($responseModel instanceof Model)
            $this->success();
        else
            $this->error();

        return redirect($this->resourceName);
    }

    private function success()
    {
        toastr()->success(__("general.message_success"), __("general.title_message_success"));
    }

    private function error()
    {
        toastr()->error(__("general.message_error"), __("general.title_message_error"));
    }
}
