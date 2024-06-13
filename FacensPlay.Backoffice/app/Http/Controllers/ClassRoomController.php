<?php

namespace App\Http\Controllers;

use App\Domain\Services\ClassroomService;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    private $classRoomService;

    public function __construct()
    {
        $this->middleware('auth');
        $this->classRoomService = new ClassroomService();
        parent::__construct($this->classRoomService, 'classroom');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = $this->classRoomService->getAllPaging();
        return view('components/classroom/index', compact('classrooms'));
    }
    
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->classRoomService->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $responseModel = $this->classRoomService->store($request);
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
        return $this->classRoomService->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->classRoomService->edit($id);
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
        $responseModel = $this->classRoomService->update($request, $id);
        return parent::getOperationResult($responseModel);
    }

    public function delete($id)
    {
        return $this->classRoomService->delete($id, route('classroom.destroy', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->classRoomService->destroy($id);
        return redirect('/classroom');
    }
}
