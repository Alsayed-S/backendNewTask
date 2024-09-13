<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Http\Requests\storeCategoryRequest;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     private $categories;
     public function __construct(CategoryRepositoryInterface $categories){
        $this->categories = $categories;
     }

    public function index()
    {
        return $this->categories->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeCategoryRequest $request)
    {
        return $this->categories->store($request);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(storeCategoryRequest $request)
    {
        return $this->categories->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->categories->destroy($request);

    }
}
