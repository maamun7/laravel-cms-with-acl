<?php namespace App\Repositories\Admin\Course;

use App\DB\Admin\Course;
use Illuminate\Support\Facades\Storage;

class EloquentCourseRepository implements CourseRepository
{
    /**
     * @var Course
     */
    protected $course;

    /**
     * @param Course $course
     */
    function __construct(Course $course)
    {
        $this->course = $course;
    }

    /**
     * @param int $status
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getAllCourse($status = 1, $order_by = 'id', $sort = 'asc')
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
    public function getCoursePaginated($per_page, $status = 1, $order_by = 'id', $sort = 'asc')
    {
        return $this->course->where('status', $status)->orderBy($order_by, $sort)->paginate($per_page);
    }

    /**
     * @param $input
     * @return mixed
     */
    public function create($input)
    {
        $folder_name = str_replace(' ', '_', strtolower($input['course_name']));
        $target_location = app_path('video_uploads/lecture_video/');

        // If folder is not exist then create new folder using course name.
        if(!is_dir($target_location.$folder_name))
        {
            //Create folder
            mkdir($target_location.$folder_name, 0777, true);
            //Create new index file
            fopen($target_location.$folder_name. "/index.php",'wr');
        }

        //Upload Course Cover Picture
        $save_path = public_path('uploads/images/course_picture/');
        $file = $input->file('cover_image');
        $image_name = preg_replace('/[^A-Za-z0-9\-_]/', '', $folder_name)."_".time()."_".$file->getClientOriginalName();
        $file->move($save_path, $image_name);
        $image = \Image::make(sprintf($save_path.'%s', $image_name))->resize(300, 200)->save();

        $this->course->course_name       = $input['course_name'];
        $this->course->price             = $input['price'];
        $this->course->cover_image       = $image_name;
        $this->course->image_path        = $save_path;
        $this->course->folder_name       = $folder_name;
        $this->course->course_duration   = $input['course_duration'];
        $this->course->total_lecture     = $input['total_lecture'];
        $this->course->sort_order        = $input['sort_order'];
        $this->course->is_new            = $input['is_new'];
        $this->course->total_lecture     = $input['total_lecture'];
        $this->course->status            = 1;
        $this->course->meta_title        = $input['meta_title'];
        $this->course->meta_description  = $input['meta_description'];
        $this->course->meta_keyword      = $input['meta_keyword'];
        $this->course->created_by        = get_logged_user_id();
        if($this->course->save()){
            return true;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOrThrowException($id)
    {
        $course = $this->course->find($id);
        if (! is_null($course)) return $course;

        throw new GeneralException('That course does not exist.');
    }

    /**
     * @param $id
     * @param $input
     * @return mixed
     */
    public function update($id, $input)
    {
        $course = $this->findOrThrowException($id);
        $old_folder_name = $course->folder_name;
        $new_folder_name = str_replace(' ', '_', strtolower($input['course_name']));
        $target_location = app_path('video_uploads/lecture_video/');

        if ($old_folder_name != $new_folder_name) {
            // If folder is exist then rename folder using course name.
            if(is_dir($target_location.$old_folder_name))
            {
                rename($target_location.$old_folder_name,$target_location.$new_folder_name);

            } else {
                //Create folder
                mkdir($target_location.$new_folder_name, 0777, true);
                //Create new index file
                fopen($target_location.$new_folder_name. "/index.php",'wr');
            }

            //Update filed
            $course->folder_name  = $new_folder_name;
        }

        //Upload Course Cover Picture
        if ($input->hasfile('cover_image')) {
            $save_path = public_path('uploads/images/course_picture/');

            $file = $input->file('cover_image');
            $image_name = preg_replace('/[^A-Za-z0-9\-_]/', '', $new_folder_name). "_" .time(). "_" .$file->getClientOriginalName();
            $file->move($save_path, $image_name);
            $image = \Image::make(sprintf($save_path . '%s', $image_name))->resize(300, 200)->save();

            //Delete existing file
            if (\File::exists($save_path.$course->cover_image))
            {
                \File::delete($save_path.$course->cover_image);

            }
            //Update db field
            $course->cover_image       = $image_name;
            $course->image_path        = $save_path;
        }

        $course->course_name       = $input['course_name'];
        $course->price             = $input['price'];
        $course->course_duration   = $input['course_duration'];
        $course->total_lecture     = $input['total_lecture'];
        $course->sort_order        = $input['sort_order'];
        $course->is_new              = $input['is_new'];
        $course->meta_title        = $input['meta_title'];
        $course->meta_description  = $input['meta_description'];
        $course->meta_keyword      = $input['meta_keyword'];
        $course->updated_by        = get_logged_user_id();
        if($course->save()){
            return true;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $save_path = public_path('uploads/images/course_picture/');
        $course = $this->course->findOrFail($id);
        //Delete existing cover image
        if (\File::exists($save_path.$course->cover_image))
        {
            \File::delete($save_path.$course->cover_image);
        }

        //Delete existing video folder
        $directory = app_path('video_uploads/lecture_video/').$course->folder_name;
        $this->deleteFolder($directory);
        $course->delete();
    }

    private function deleteFolder($path)
    {
        if (is_dir($path) === true)
        {
            $files = array_diff(scandir($path), array('.', '..'));

            foreach ($files as $file)
            {
                $this->deleteFolder(realpath($path) . '/' . $file);
            }
            return rmdir($path);
        }

        else if (is_file($path) === true)
        {
            return unlink($path);
        }
        return false;
    }

    /**
     * @param int $status
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getLists($status = 1, $order_by = 'id', $sort = 'asc')
    {
        return ['' => 'Select Course'] + $this->course->where('status', $status)->orderBy($order_by, $sort)->lists('course_name', 'id')->toArray();
    }
}
