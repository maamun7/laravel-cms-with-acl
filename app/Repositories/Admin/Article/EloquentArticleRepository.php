<?php namespace App\Repositories\Admin\Article;
use App\DB\Admin\Article;

class EloquentArticleRepository implements ArticleRepository
{
    /**
     * @var Article
     */
    protected $article;

    /**
     * @param Article $article
     */
    function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * @param int $status
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getAllArticle($status = 1, $order_by = 'id', $sort = 'asc')
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
    public function getArticlePaginated($per_page, $status = 1, $order_by = 'id', $sort = 'asc')
    {
        return $this->article->with('article_category')->where('status', $status)->orderBy($order_by, $sort)->paginate($per_page);
    }

    /**
     * @param $input
     * @param $roles
     * @return mixed
     */
    public function create($input)
    {
        $this->article->article_name = $input['article_name'];
        $this->article->description = $input['description'];
        $this->article->article_category_id = $input['article_category'];
        $this->article->status = 1;
        $this->article->created_by = get_logged_user_id();
        if ($this->article->save()) {
            return true;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOrThrowException($id)
    {
        $article = $this->article->find($id);
        if (! is_null($article)) return $article;

        throw new GeneralException('That article does not exist.');
    }

    /**
     * @param $id
     * @param $input
     * @param $roles
     * @return mixed
     */
    public function update($id, $input)
    {
        $article = $this->findOrThrowException($id);
        $article->article_name = $input['article_name'];
        $article->description = $input['description'];
        $article->article_category_id = $input['article_category'];
        $article->updated_by = get_logged_user_id();
        if( $article->save()){
            return true;
        }
        throw new GeneralException('There was a problem updating this article. Please try again.');

    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id){
        $article = $this->article->findOrFail($id);
        $article->delete();
    }

}

