<?php namespace App\Repositories\Admin\ArticleCategory;
use App\DB\Admin\ArticleCategory;

class EloquentArticleCategoryRepository implements ArticleCategoryRepository
{
    /**
     * @var ArticleCategory
     */
    protected $articleCategory;

    /**
     * @param ArticleCategory $articleCategory
     */
    function __construct(ArticleCategory $articleCategory)
    {
        $this->articleCategory = $articleCategory;
    }


    /**
     * @param int $status
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getAllArticleCategory($status = 1, $order_by = 'id', $sort = 'asc')
    {
        return $this->articleCategory->where('status', $status)->orderBy($order_by, $sort)->get();
    }

    /**
     * @param $per_page
     * @param int $status
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getArticleCategoryPaginated($per_page, $status = 1, $order_by = 'id', $sort = 'asc')
    {
        return $this->articleCategory->where('status', $status)->orderBy($order_by, $sort)->paginate($per_page);
    }

    /**
     * @param $input
     * @param $roles
     * @return mixed
     */
    public function create($input)
    {
        $articleCategory = new ArticleCategory();
        $articleCategory->category_name = $input['category_name'];
        $articleCategory->short_description = $input['description'];
        $articleCategory->status = 1;
        $articleCategory->created_by = get_logged_user_id();
        if($articleCategory->save()){
            return true;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOrThrowException($id)
    {
        $category = $this->articleCategory->find($id);
        if (! is_null($category)) return $category;

        throw new GeneralException('That category does not exist.');
    }

    /**
     * @param $id
     * @param $input
     * @param $roles
     * @return mixed
     */
    public function update($id, $input)
    {
        $category = $this->findOrThrowException($id);
        $category->category_name = $input['category_name'];
        $category->short_description = $input['description'];
        $category->updated_by = get_logged_user_id();
        if( $category->save()){
            return true;
        }
        throw new GeneralException('There was a problem updating this article category. Please try again.');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $group = $this->articleCategory->findOrFail($id);
        $group->delete();
    }

    /**
     * @param int $status
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getLists($status = 1, $order_by = 'id', $sort = 'asc')
    {
        return ['' => 'Select Category'] + $this->articleCategory->where('status', $status)->orderBy($order_by, $sort)->lists('category_name', 'id')->toArray();
    }
}
