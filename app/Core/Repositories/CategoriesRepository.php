<?php

namespace App\Core\Repositories;

interface CategoriesRepository {
    public function findById(int $id);
    public function getAll();
    public function create($categoryData);
    public function update($id, $categoryData);
}
