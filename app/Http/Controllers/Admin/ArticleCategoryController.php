<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\ArticleCategory\ArticleCategoryRepository;
use App\Http\Requests\Admin\ArticleCategoryRequest;

class ArticleCategoryController extends Controller
{
    protected $articleCategory;

    function __construct(ArticleCategoryRepository $articleCategory)
    {
        $this->articleCategory = $articleCategory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $per_page = 25;
        return view('admin.article-category.index')
            ->withCategories($this->articleCategory->getArticleCategoryPaginated($per_page));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.article-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ArticleCategoryRequest $request)
    {
        $this->articleCategory->create($request);
        return redirect('admin/article_categories')->with('flashMessageSuccess','The category was successfully added.');
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
        return view('admin.article-category.edit')
            ->withCategory($this->articleCategory->findOrThrowException($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ArticleCategoryRequest $request, $id)
    {
        $this->articleCategory->update($id,$request);
        return redirect('admin/article_categories')->with('flashMessageSuccess','The category was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->articleCategory->delete($id);
        return redirect('admin/article_categories')->with('flashMessageSuccess','The category was successfully deleted.');
    }
}
