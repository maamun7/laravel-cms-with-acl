<?php namespace App\Repositories\Admin\Menu;

/**
 * Interface MenuRepository
 * @package App\Repositories\Admin\Menu
 */
interface MenuRepository
{
    /**
     * @param int $status
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getAllMenu($status = 1, $order_by = 'id', $sort = 'asc');

    /**
     * @param $per_page
     * @param int $status
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getMenuPaginated($per_page, $status = 1, $order_by = 'id', $sort = 'asc',$parent = 0,$level = 0);

    /**
     * @param $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param $id
     * @return mixed
     */
    public function findOrThrowException($id);

    /**
     * @param $id
     * @param $input
     * @return mixed
     */
    public function update($id, $input);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param int $status
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getMenuLists($status = 1, $order_by = 'id', $sort = 'asc');

    /**
     * @return mixed
     */
    public function getAllArticleCategory($status = 1, $order_by = 'id', $sort = 'asc');

    /**
     * @return mixed
     */
    public function getAllArticles($status = 1, $order_by = 'id', $sort = 'asc');

    /**
     * @param $array
     * @return mixed
     */
    public function do_update_order($post_itms);


}
