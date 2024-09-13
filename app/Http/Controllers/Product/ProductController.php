<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Product\ProductRepositoryInterface;
use App\Models\Product;
use App\Http\Requests\storeProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     private $products;
     public function __construct(ProductRepositoryInterface $products){
        $this->products = $products;
     }
    public function index()
    {
        return $this->products->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->products->create();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeProductRequest $request)
    {
        return $this->products->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->products->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->products->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->products->destroy($request);
    }

    public function search(Request $request)
    {

        // $search = $request->input('search');

        // $query = Product::query();

        // if ($search) {
        //     $keywords = explode(' ', $search);
        //     $query->where(function ($q) use ($keywords) {
        //         foreach ($keywords as $keyword) {
        //             $q->orWhere('title', 'LIKE', "%$keyword%")
        //               ->orWhere('brand', 'LIKE', "%$keyword%");
        //         }
        //     });
        // }

        // $products = Product::query()->paginate(10);

        $search = $request->input('search');
        $price = $request->input('price');
        $query = Product::query();

        if (!empty($search)) {
           $query->where('brand','like', "%$search%");
        }
        if (!empty($price)) {
            $query->where('price','like', "%$price%");
         }
        $products =$query->get() ;

        return view('Dashboard.Product.index', compact('products'));
    }

    public function getProduct()
    {
        return $this->products->getProduct();

        return response()->json([
            'success'=>'true',
            'data'=>$products
        ],200);

    }
}
