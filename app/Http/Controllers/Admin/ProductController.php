<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DB\Admin\Product;
use App\Repositories\Admin\Product\ProductRepositoryContract;
use App\Repositories\Admin\Product\EloquentProductRepository;

class ProductController extends Controller
{
	/**
	 * @var EloquentProductRepository
	 */
	protected $products;
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
	public function __construct(
		EloquentProductRepository $products) {
		$this->products = $products;
	}
	
    public function index()
    {
        return view('admin.dashboard')
            ->withProducts($this->products->get_all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
