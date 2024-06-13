<?php

namespace App\Http\Controllers;

use App\Domain\Services\ViewedClassService;
use Illuminate\Http\Request;

class ViewedClassController extends Controller
{
    private $viewedClassService;

    public function __construct()
    {
        $this->middleware('auth');
        $this->viewedClassService = new ViewedClassService();
        parent::__construct($this->viewedClassService, 'viewedclass');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewedclasses = $this->viewedClassService->getAllPaging();
        return view('components/viewedclass/index', compact('viewedclasses'));
    }
    
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->viewedClassService->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $responseModel = $this->viewedClassService->store($request);
        return parent::getOperationResult($responseModel);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->viewedClassService->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->viewedClassService->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $responseModel = $this->viewedClassService->update($request, $id);
        return parent::getOperationResult($responseModel);
    }

    public function delete($id)
    {
        return $this->viewedClassService->delete($id, route('viewedclass.destroy', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->viewedClassService->destroy($id);
        return redirect('/viewedclass');
    }
}
