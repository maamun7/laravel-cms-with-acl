<?php namespace App\Repositories\Admin\VideoUpload;

use App\DB\Admin\VideoUpload;

class EloquentVideoUploadRepository implements VideoUploadRepository
{
    protected $video;

    function __construct(VideoUpload $video)
    {
        $this->video = $video;
    }

    /**
     * @param int $status
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getAllVideo($status = 1, $order_by = 'id', $sort = 'asc')
    {
        return $this->video->where('status', $status)->orderBy($order_by, $sort)->get();
    }

    /**
     * @param $per_page
     * @param int $status
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getVideoPaginated($per_page, $status = 1, $order_by = 'id', $sort = 'asc')
    {
        return $this->video->where('status', $status)->orderBy($order_by, $sort)->paginate($per_page);
    }

    /**
     * @param $input
     * @return mixed
     */
    public function create($input)
    {
        //$menu = new Menu;

        $file = $input->file('video');
        $video_name = time()."-".$file->getClientOriginalName();
        $file->move(public_path() . '/video/', $video_name);


        $this->video->lecture_title    = $input['lecture_title'];
        $this->video->video_file_name  = $video_name;
        $this->video->status       = 1;
        //$this->video->created_by   = get_logged_user_id();
        if($this->video->save()){
            return true;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOrThrowException($id)
    {
        // TODO: Implement findOrThrowException() method.
    }

    /**
     * @param $id
     * @param $input
     * @return mixed
     */
    public function update($id, $input)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
