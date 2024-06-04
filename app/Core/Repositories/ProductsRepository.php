<?php

namespace App\Core\Repositories;

interface ProductsRepository {

    public function findById($id);
    public function getAll(array $filters);
    public function create($productData);
    public function update($id, $productData);
    public function delete($id);

}
