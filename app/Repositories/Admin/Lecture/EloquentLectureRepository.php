<?php namespace App\Repositories\Admin\Lecture;

use App\DB\Admin\Course;
use App\DB\Admin\Lecture;

class EloquentLectureRepository implements LectureRepository
{
    /**
     * @var
     */
    protected $lecture;
    protected $course;

    /**
     * @param $lecture
     */
    function __construct(Lecture $lecture,Course $course)
    {
        $this->lecture = $lecture;
        $this->course = $course;
    }

    /**
     * @param int $status
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getAllLecture($status = 1, $order_by = 'id', $sort = 'asc')
    {
        return $this->article->where('status', $status)->orderBy($order_by, $sort)->get();
    }

    /**
     * @param $per_page
     * @param int $status
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getLecturePaginated($per_page, $status = 1, $order_by = 'id', $sort = 'asc')
    {
        return $this->lecture->where('status', $status)->orderBy($order_by, $sort)->paginate($per_page);
    }

    /**
     * @param $input
     * @return mixed
     */
    public function create($input)
    {
        $lecture_name = str_replace(' ', '_', strtolower($input['lecture_name']));

        //Upload Course Cover Picture
        $save_path = public_path('uploads/images/lecture_picture/');
        $file = $input->file('cover_image');
        $image_name = $lecture_name."-".time()."-".$file->getClientOriginalName();
        $file->move($save_path, $image_name);
        $image = \Image::make(sprintf($save_path.'%s', $image_name))->resize(300, 200)->save();

        $this->lecture->lecture_name     = $input['lecture_name'];
        $this->lecture->cover_image      = $image_name;
        $this->lecture->image_path       = $save_path;
        $this->lecture->course_id        = $input['course'];
        $this->lecture->status            = 1;
        $this->lecture->created_by        = get_logged_user_id();
        if($this->lecture->save()){
            return $this->lecture->id;
        }
        return false;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOrThrowException($id)
    {
        $lecture = $this->lecture->find($id);
        if (! is_null($lecture)) return $lecture;

        throw new GeneralException('That lecture does not exist.');
    }

    /**
     * @param $id
     * @param $input
     * @return mixed
     */
    public function update($id, $input)
    {
        $lecture = $this->findOrThrowException($id);
        $lecture_name = str_replace(' ', '_', strtolower($input['lecture_name']));

        //Upload Course Cover Picture
        if ($input->hasfile('cover_image')) {
            $save_path = public_path('uploads/images/lecture_picture/');
            $file = $input->file('cover_image');
            $image_name = $lecture_name . "-" . time() . "-" . $file->getClientOriginalName();
            $file->move($save_path, $image_name);
            $image = \Image::make(sprintf($save_path . '%s', $image_name))->resize(300, 200)->save();

            //Delete existing image
            if (\File::exists($save_path.$lecture->cover_image))
            {
                \File::delete($save_path.$lecture->cover_image);
            }
            //Update DB Field
            $lecture->cover_image      = $image_name;
            $lecture->image_path       = $save_path;
        }

        $lecture->lecture_name     = $input['lecture_name'];
        $lecture->course_id        = $input['course'];
        $lecture->status            = 1;
        $lecture->updated_by        = get_logged_user_id();
        if($lecture->save()){
            return $this->lecture->id;
        }
        return false;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $picture_path = public_path('uploads/images/lecture_picture/');
        $lecture = $this->lecture->findOrFail($id);
        $course = $this->course->findOrFail($lecture->course_id);
        //Delete existing cover image
        if (\File::exists($picture_path.$lecture->cover_image))
        {
            \File::delete($picture_path.$lecture->cover_image);
        }

        //Delete existing video
        $video_path = app_path('video_uploads/lecture_video/').$course->folder_name."/";

        if (\File::exists($video_path.$lecture->video_file))
        {
            \File::delete($video_path.$lecture->video_file);
        }
        $lecture->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function upload_video($id, $input)
    {
        if ($input->hasfile('video')) {

            $lecture = $this->findOrThrowException($id);

            $course_data = \App\DB\Admin\Course::findOrFail(1);
            $folder_name = $course_data->folder_name;
            $save_path = app_path('video_uploads/lecture_video/'.$folder_name.'/');
            $file = $input->file('video');
            $video_name = $lecture->lecture_name. "-" .time() . "-" . $file->getClientOriginalName();
            $file->move($save_path, $video_name);


            //Delete existing file
            if (\File::exists($save_path.$lecture->video_file))
            {
                \File::delete($save_path.$lecture->video_file);

            }
            //Update database
            $lecture->video_file = $video_name;
            $lecture->video_file_path = $save_path;
            $lecture->video_duration = getVideoPlayingDuration($save_path.$video_name);
            $lecture->video_size = getVideoFileSize($save_path.$video_name);
            $lecture->video_resolution = getVideoResolution($save_path.$video_name);
            if ($lecture->save()) {
                return true;
            }
        }
    }
}
