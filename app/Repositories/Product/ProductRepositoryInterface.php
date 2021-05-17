<?php

namespace App\Repositories\Product;

use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    /**
     * Get product
     * @return mixed
     */
    public function getProduct();
}
