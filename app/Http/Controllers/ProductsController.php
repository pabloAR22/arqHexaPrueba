<?php

namespace App\Http\Controllers;

use App\Application\UseCases\Products\GetAllProductsUseCase;
use App\Application\UseCases\Products\GetProductsByIdUseCase;
use App\Application\UseCases\Products\CreateProductUseCase;
use App\Application\UseCases\Products\UpdateProductsUseCase;
use App\Application\UseCases\Products\DeleteProductsUseCase;
use App\Http\Requests\Products\CreateProductsRequest;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllProductsUseCase $useCase)
    {
        return $useCase->execute();
    }

    public function find(int $id, GetProductsByIdUseCase $useCase)
    {
        $product = $useCase->execute($id);
        return $product;
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductsRequest $request, CreateProductUseCase $useCase)
    {
        try {
            return $useCase->execute($request);
        } catch (\Throwable $th) {
            return response(["message" => 'Error on registered'], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JsonModel  $jsonModel
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, Request $request, UpdateProductsUseCase $useCase)
    {
        try {
            return $useCase->execute($id, $request);
        } catch (\Throwable $th) {
            return response(["message" => 'Error on updating'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\JsonModel  $jsonModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, DeleteProductsUseCase $useCase)
    {
        try {
            return $useCase->execute($id);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }
}
