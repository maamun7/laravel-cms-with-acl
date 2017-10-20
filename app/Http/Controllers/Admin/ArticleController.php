<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\Article\ArticleRepository;
use App\Repositories\Admin\ArticleCategory\ArticleCategoryRepository;
use App\Http\Requests\Admin\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * @var ArticleRepository
     */
    protected $article;
    /**
     * @var ArticleCategoryRepository
     */
    protected $category;

    /**
     * @param ArticleRepository $article
     * @param ArticleCategoryRepository $category
     */
    function __construct(ArticleRepository $article,ArticleCategoryRepository $category)
    {
        $this->article = $article;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $perPage = 20;
        return view('admin.article.index')
            ->withArticles($this->article->getArticlePaginated($perPage));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.article.create')
            ->withCategories($this->category->getLists());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        $this->article->create($request);
        return redirect('admin/articles')->with('flashMessageSuccess','The article was successfully added.');
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
        return view('admin.article.edit')
            ->withArticle($this->article->findOrThrowException($id))
            ->withCategories($this->category->getLists());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id,ArticleRequest $request)
    {
        $this->article->update($id,$request);
        return redirect('admin/articles')->with('flashMessageSuccess','The Article was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->article->delete($id);
        return redirect('admin/articles')->with('flashMessageSuccess','The Article was successfully deleted.');
    }

    public function change_upload_path()
    {
        if (file_exists("uploads/articles/images/" . $_FILES["upload"]["name"]))
        {
            echo $_FILES["upload"]["name"] . " already exists please choose another image. ";
        }
        else
        {
            move_uploaded_file($_FILES["upload"]["tmp_name"],
                "uploads/articles/images/" . $_FILES["upload"]["name"]);
            echo "Stored in: " . "uploads/articles/images" . $_FILES["upload"]["name"];
        }
    }

    public function browse_image()
    {
        return view('admin.article.ckfinder');
    }
}
