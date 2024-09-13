<?php
namespace App\Repository\Product;
use App\Interfaces\Product\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{
  public function index()
  {
     $products = Product::all();
     return view('Dashboard.Product.index',compact('products'));
  }
  public function create()
  {
    $categories = Category::all();
    return view('Dashboard.Product.add',compact('categories'));
  }

  public function store($request)
  {
    DB::beginTransaction();

    try {
         $products = new Product();
         $products->category_id = $request->category_id;
         $products->title = $request->title;
         $products->brand = $request->brand;
         $products->details = $request->details;
         $products->price = $request->price;
         if ($image = $request->file('image')) {
          $destinationPath = 'uploads/products/';
          $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
          $image->move($destinationPath, $profileImage);
          $products['image'] = "$profileImage";
      }
         $products->save();

      DB::commit();
         session()->flash('add');
         return redirect()->route('products.index');
  }
       catch (\Exception $e) {
      DB::rollback();
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }
  }

  public function edit($id)
  {
    $products = Product::findOrFail($id);
    $categories = Category::all();
    return view('Dashboard.Product.update',compact('products','categories'));
  }

  public function update($request)
  {

    DB::beginTransaction();

    try {

        $products = Product::findOrFail($request->id);
        $products->category_id = $request->category_id;
        $products->title = $request->title;
        $products->brand = $request->brand;
        $products->details = $request->details;
        $products->price = $request->price;

        if ($image = $request->file('image')) {
           if ($products->image && file_exists(public_path('uploads/products/' . $products->image))) {
               unlink(public_path('uploads/products/' . $products->image));
           }


           $destinationPath = 'uploads/products/';
           $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
           $image->move($destinationPath, $profileImage);
           $products->image = $profileImage;
       }
        $products->save();

      DB::commit();
      session()->flash('edit');
      return redirect()->route('products.index');
  }
       catch (\Exception $e) {
      DB::rollback();
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }

  }

  public function destroy($request)
  {
    $products = Product::findOrFail($request->id);
      if ($products->image && file_exists(public_path('uploads/products/' . $products->image))) {
        unlink(public_path('uploads/products/' . $products->image));
    }
    $products->delete();

    session()->flash('delete');
    return redirect()->route('products.index');
  }
//api
  public function getProduct()
  {
    return Product::all();
  }



}
