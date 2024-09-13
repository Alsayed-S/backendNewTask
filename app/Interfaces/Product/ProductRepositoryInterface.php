<?php
namespace App\Interfaces\Product;

interface ProductRepositoryInterface
{
   public function index();

   public function create();

   public function store($request);

   public function edit($id);

   public function update($request);

   public function destroy($request);


   public function getProduct();
//    public function show($id);
}
