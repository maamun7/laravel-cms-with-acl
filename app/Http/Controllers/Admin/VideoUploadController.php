<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Admin\VideoUpload\VideoUploadRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\VideoRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VideoUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $video;

    function __construct(VideoUploadRepository $video)
    {
        $this->video = $video;
    }

    public function index()
    {
        $per_page = 25;
        return view('admin.video.index')
            ->withVideos($this->video->getVideoPaginated($per_page));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.video.create');
           // ->withMenus($this->video->getMenuLists());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(VideoRequest $request)
    {
        $this->video->create($request);
        return redirect('admin/video')->with('flashMessageSuccess','The Video was successfully added.');

        //$image = Image::make(sprintf('video/%s', $image_name))->resize(200, 200)->save();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
