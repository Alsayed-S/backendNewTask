<?php
namespace App\Interfaces\Category;

interface CategoryRepositoryInterface
{
   public function index();

//    public function create();

   public function store($request);


   public function update($request);

   public function destroy($request);
//    public function show($id);
}
