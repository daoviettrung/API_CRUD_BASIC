<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\Repository
     */
    protected $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index()
    {
        $products = $this->productRepo->getAll();
        return $products;
    }

    public function show($id)
    {
        $product = $this->productRepo->find($id);

        return $product;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if($this->productRepo->create($data)){
            return true;
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        if($this->productRepo->update($id, $data)){
            return true;
        }
    }

    public function delete($id)
    {
        if($this->productRepo->delete($id)){
            return true;
        }
    }
}
