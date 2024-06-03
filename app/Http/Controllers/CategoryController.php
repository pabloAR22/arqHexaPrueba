<?php

namespace App\Http\Controllers;

use App\Application\UseCases\Categories\GetAllCategoriesUseCase;
use App\Application\UseCases\Categories\GetCategoriesByIdUseCase;
use App\Application\UseCases\Categories\CreateCategoryUseCase;
use App\Application\UseCases\Categories\UpdateCategoriesUseCase;
use App\Http\Requests\Categories\CreateCategoriesRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(GetAllCategoriesUseCase $useCase)
    {
        return $useCase->execute();
    }

    public function find(int $id, GetCategoriesByIdUseCase $useCase)
    {
        $category = $useCase->execute($id);
        return $category;
    }

    public function store(CreateCategoriesRequest $request, CreateCategoryUseCase $useCase)
    {
        try {
            return $useCase->execute($request);
        } catch (\Throwable $th) {
            return response(["message" => 'Error on register Category'], 500);
        }
    }

    public function update(int $id, Request $request, UpdateCategoriesUseCase $useCase)
    {
        try {
            return $useCase->execute($id, $request);
        } catch (\Throwable $th) {
            return response(["message" => 'Error on updating category'], 500);
        }
    }
}
