<?php namespace App\Repositories\Admin\Menu;
use App\DB\Admin\Menu;
use App\DB\Admin\ArticleCategory;
use App\DB\Admin\Article;

class EloquentMenuRepository implements MenuRepository
{
    /**
     * @var Menu
     */
    protected $menu;
    protected $category;
    protected $article;
    protected $data;

    /**
     * @param Menu $menu
     */
    function __construct(Menu $menu,ArticleCategory $category,Article $article)
    {
        $this->menu = $menu;
        $this->category = $category;
        $this->article = $article;
        $this->data = [];
    }

    /**
     * @param int $status
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getAllMenu($status = 1, $order_by = 'id', $sort = 'asc')
    {
       return $this->menu->where('status', $status)->orderBy($order_by, $sort)->get();
    }

    /**
     * @param $per_page
     * @param int $status
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getMenuPaginated($per_page, $status = 1, $order_by = 'ordering', $sort = 'asc',$parent = 0,$level = 0)
    {
        $menus = $this->menu->where('status',$status)->where('parent_id',$parent)->orderBy($order_by, $sort)->get();
        if (count($menus)) {
            foreach ($menus as $menu) {
                $menu['level'] = $level;
                $this->data[] = $menu;
                $this->getMenuPaginated($per_page, $status, $order_by, $sort,$menu['id'],$level + 1);
            }
        }
        return $this->data;
    }

    /**
     * @param $input
     * @return mixed
     */
    public function create($input)
    {
        //$menu = new Menu;
        $this->menu->title        = $input['title'];
        $this->menu->alias        = strtolower(str_replace(" ", "_",$input['alias']));
        if ($input['alias'] == '') {
            $this->menu->alias        = strtolower(str_replace(" ", "_",$input['title']));
        }
        $this->menu->menu_type    = $input['menu_type'];
        $this->menu->parent_id    = $input['parent_id'];
        $this->menu->ordering     = $input['order'];
        $this->menu->link         = $input['link'];
        $this->menu->published    = $input['published'];
        $this->menu->content_type = $input['content_type'];
        $this->menu->content_id   = $input['content_id'];
        $this->menu->status       = 1;
        $this->menu->created_by   = get_logged_user_id();
        if($this->menu->save()){
            return true;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOrThrowException($id)
    {
        $menu = $this->menu->find($id);
        if (! is_null($menu)) return $menu;

        throw new GeneralException('That menu does not exist.');
    }

    /**
     * @param $id
     * @param $input
     * @return mixed
     */
    public function update($id, $input)
    {
        $menu = $this->findOrThrowException($id);
        $menu->title        = $input['title'];
        $menu->alias        = strtolower(str_replace(" ", "_",$input['alias']));
        if ($input['alias'] == '') {
            $menu->alias        = strtolower(str_replace(" ", "_",$input['title']));
        }
        $menu->menu_type    = $input['menu_type'];
        $menu->parent_id    = $input['parent_id'];
        $menu->ordering     = $input['order'];
        $menu->link         = $input['link'];
        $menu->published    = $input['published'];
        $menu->content_type = $input['content_type'];
        $menu->content_id   = $input['content_id'];
        $menu->updated_by   = get_logged_user_id();
        if($menu->save()){
            return true;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $menu = $this->menu->findOrFail($id);
        $menu->delete();
    }

    /**
     * @param int $status
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getMenuLists($status = 1, $order_by = 'id', $sort = 'asc')
    {
        return ['' => 'No Parent'] + $this->menu->where('status', $status)->orderBy($order_by,$sort)->lists('title', 'id')->toArray();
    }

    /**
     * @return mixed
     */
    public function getAllArticleCategory($status = 1, $order_by = 'id', $sort = 'asc')
    {
        return $this->category->where('status', $status)->orderBy($order_by, $sort)->get();
    }

    /**
     * @return mixed
     */
    public function getAllArticles($status = 1, $order_by = 'id', $sort = 'asc')
    {
        return $this->article->with('article_category')->where('status', $status)->orderBy($order_by, $sort)->get();
    }

    /**
     * @param $array
     * @return mixed
     */
    public function do_update_order($post_itms)
    {
        parse_str($post_itms,$itemOrder);
        foreach ($itemOrder['item'] as $key => $value) {
            $menu = $this->findOrThrowException($value);
            $menu->ordering = $key;
            $menu->save();
        }
    }
}
