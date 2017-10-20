<?php

namespace App\Http\Controllers\Admin;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\Menu\MenuRepository;
use App\Http\Requests\Admin\MenuRequest;
use App\Http\Requests\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $menu;

    function __construct(MenuRepository $menu)
    {
        $this->menu = $menu;
    }

    public function index()
    {
        $per_page = 25;
        return view('admin.menu.index')
            ->withMenus($this->menu->getMenuPaginated($per_page));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.menu.create')
            ->withMenus($this->menu->getMenuLists());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(MenuRequest $request)
    {
        $this->menu->create($request);
        return redirect('admin/menus')->with('flashMessageSuccess','The menu was successfully added.');
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
        return view('admin.menu.edit')
            ->withMenu($this->menu->findOrThrowException($id))
            ->withMenus($this->menu->getMenuLists());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(MenuRequest $request, $id)
    {
        $this->menu->update($id,$request);
        return redirect('admin/menus')->with('flashMessageSuccess','The menu was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->menu->delete($id);
        return redirect('admin/menus')->with('flashMessageSuccess','The menu was successfully deleted.');
    }

    public function showCategoryList()
    {
        return view('admin.menu.category_modal')
            ->withCategories($this->menu->getAllArticleCategory());
    }

    public function showArticleList()
    {
        return view('admin.menu.article_modal')
            ->withArticles($this->menu->getAllArticles());
    }

    public function update_ordering()
    {
        if (\Input::has('items'))
        {
            $this->menu->do_update_order($_POST['items']);
            return redirect('admin/menus')->with('flashMessageSuccess','The menu was successfully re-ordered.');
        }
    }
}
