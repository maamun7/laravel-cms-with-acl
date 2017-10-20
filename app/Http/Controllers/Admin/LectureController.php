<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LectureUpdateRequest;
use App\Repositories\Admin\Course\CourseRepository;
use App\Repositories\Admin\Lecture\LectureRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\LectureRequest;
use App\Http\Requests\Admin\UploadLectureVideoRequest;
use App\Http\Controllers\Controller;

/**
 * Class LectureController
 * @package App\Http\Controllers\Admin
 */
class LectureController extends Controller
{
    protected $course;
    protected $lecture;

    /**
     * @param $leacture
     */
    function __construct(CourseRepository $course,LectureRepository $lecture)
    {
        $this->course = $course;
        $this->lecture = $lecture;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $perPage = 20;
        return view('admin.lecture.index')
            ->withLectures($this->lecture->getLecturePaginated($perPage));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.lecture.create')
            ->withCourse($this->course->getLists());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(LectureRequest $request)
    {
        $id = $this->lecture->create($request);
        return redirect('admin/lecture/'.$id.'/video_upload')->with('flashMessageSuccess','The lecture was successfully created.');
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
        return view('admin.lecture.edit')
            ->withLecture($this->lecture->findOrThrowException($id))
            ->withCourse($this->course->getLists());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id,LectureUpdateRequest $request)
    {
        $this->lecture->update($id,$request);
        return redirect('admin/lecture/'.$id.'/video_upload')->with('flashMessageSuccess','The lecture was successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->lecture->delete($id);
        return redirect('admin/lectures')->with('flashMessageSuccess','The course was successfully deleted.');
    }

    public function video_upload($id)
    {
        if ($id == '') {
            return redirect('admin/lectures')->with('flashMessageAlert','Lecture did not select');
        }
        return view('admin.lecture.video_upload') ->withLecture($this->lecture->findOrThrowException($id));
    }

    public function upload_progress(UploadLectureVideoRequest $request, $id)
    {
        $this->lecture->upload_video($id,$request);
    }
}
