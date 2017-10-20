<?php namespace App\Repositories\Admin\Product;
use App\DB\Admin\Product;
use App\Exceptions\GeneralException;

/**
 * Class EloquentProductRepository
 * @package App\Repositories\Product
 */
class EloquentProductRepository implements ProductRepositoryContract {


    /**
     * @param $id
     * @param bool $withPermissions
     * @return mixed
     */
    public function get_all()
    {
        return Product::where('status', 1)->orderBy("id", "asc")->paginate(20);
    }
}