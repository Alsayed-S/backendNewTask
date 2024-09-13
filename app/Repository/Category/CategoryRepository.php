<?php
namespace App\Repository\Category;
use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryRepositoryInterface
{
  public function index()
  {
    $categories = Category::all();
      return view('Dashboard.Category.index',compact('categories'));
  }

  public function store($request)
  {

    DB::beginTransaction();

    try {

        $categories = new Category();
        $categories->name = $request->name;
        $categories->details = $request->details;
        $categories->save();

      DB::commit();
      session()->flash('add');
     return redirect()->route('categories.index');
  }
       catch (\Exception $e) {
      DB::rollback();
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }
  }

  public function update($request)
  {

    DB::beginTransaction();

    try {

        $categories = category::findOrFail($request->id);
        $categories->update([
            'name'=>$request->name,
            'details'=>$request->details,
        ]);

      DB::commit();
      session()->flash('edit');
      return redirect()->route('categories.index');
  }
       catch (\Exception $e) {
      DB::rollback();
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }
  }

  public function destroy($request)
  {
    $categories = Category::findOrFail($request->id);
    $categories->delete();

    session()->flash('delete');
    return redirect()->route('categories.index');
  }


}
