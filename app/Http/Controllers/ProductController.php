<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product as ProductResource;
use App\Http\Requests\StorePostRequest;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\Repository
     */
    protected $productRepo;

    /**
     * set ProductRepositoryInterface is $productRepo
     */
    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    /**
     * Get all data
     * @return array
     */
    public function index()
    {
        $products = $this->productRepo->getAll();
        return ProductResource::collection($products);
    }

    /**
     * Get a object by id
     * @param $id is id product
     * @return array
     */
    public function show($id)
    {
        $product = $this->productRepo->find($id);
        return ProductResource::collection($product);
    }

    /**
     * create new object product
     * @param request is data by user submit
     * @return json or boolean
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        $data = $request->all();
        if ($this->productRepo->create($data)) {
            return response()->json($data, 201);
        } else {
            return false;
        }
    }

    /**
     * update  a object by id
     * @param id is id product need edit
     * @param request is data by user submit
     * @return json or boolean
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validated();
        $data = $request->all();
        if ($this->productRepo->update($id, $data)) {
            return response()->json($data, 200);
        } else {
            return false;
        }
    }

    /**
     * delete  a object by id
     * @param id is id product need edit
     * @return json or boolean
     */
    public function destroy($id)
    {
        if ($this->productRepo->delete($id)) {
            return response()->json(null, 204);
        } else {
            return false;
        }
    }
}
