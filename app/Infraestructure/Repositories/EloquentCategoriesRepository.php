<?php

namespace App\Infraestructure\Repositories;

use App\Core\Contracts\ExternalAdapterContract;
use App\Core\Entities\Category;
use App\Core\Repositories\CategoriesRepository;

class EloquentCategoriesRepository implements CategoriesRepository {

    public function findById(int $id) {
         return Category::find($id);
    }

    public function getAll() {
        return Category::all();
    }

    public function create($categoryData) {
        $category = new Category([
            'name' => $categoryData->name
        ]);

        $category->save();

        return $category;
    }

    public function update($id, $categoryData) {
        $category = Category::findOrFail($id);

        $category->name = $categoryData->name;
        $category->save();

        return $category;
    }

    public function delete($id) {
        $category = Category::findOrFail($id);

        $category->delete();
        return $category;
    }
}
