<?php namespace App\Repositories\Admin\Product;

/**
 * Interface ProductRepositoryContract
 * @package App\Repositories\Product
 */
interface ProductRepositoryContract {

	/**
	 * @param $id
	 * @param bool $withPermissions
	 * @return mixed
	 */
	public function get_all();
}