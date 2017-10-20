<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Admin\Course\CourseRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Admin\CourseRequest;
use App\Http\Requests\Admin\CourseUpdateRequest;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * @var CourseRepository
     */
    protected $course;

    /**
     * @param CourseRepository $course
     */
    function __construct(CourseRepository $course)
    {
        $this->course = $course;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $perPage = 20;
        return view('admin.course.index')
            ->withCourses($this->course->getCoursePaginated($perPage));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CourseRequest $request)
    {
        $this->course->create($request);
        return redirect('admin/courses')->with('flashMessageSuccess','The course was successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin.course.edit')
            ->withCourse($this->course->findOrThrowException($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(CourseUpdateRequest $request, $id)
    {
        $this->course->update($id,$request);
        return redirect('admin/courses')->with('flashMessageSuccess','The course was successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->course->delete($id);
        return redirect('admin/courses')->with('flashMessageSuccess','The lecture was successfully deleted.');
    }
}
