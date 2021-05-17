<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
     * get the corresponding model
     */
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    /**
     * get 5 titles in product
     */
    public function getProduct()
    {
        return $this->model->select('title')->take(5)->get();
    }
}
