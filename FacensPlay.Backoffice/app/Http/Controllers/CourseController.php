<?php

namespace App\Http\Controllers;

use App\Domain\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private $courseService;

    public function __construct()
    {
        $this->middleware('auth');
        $this->courseService = new CourseService();
        parent::__construct($this->courseService, 'course');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = $this->courseService->getAllPaging();
        return view('components/course/index', compact('courses'));
    }
    
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->courseService->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $responseModel = $this->courseService->store($request);
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
        return $this->courseService->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->courseService->edit($id);
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
        $responseModel = $this->courseService->update($request, $id);
        return parent::getOperationResult($responseModel);
    }

    public function delete($id)
    {
        return $this->courseService->delete($id, route('course.destroy', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->courseService->destroy($id);
        return redirect('/course');
    }
}
