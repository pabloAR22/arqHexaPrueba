<?php

namespace App\Application\UseCases\Products;

use App\Core\Repositories\ProductsRepository;

class UpdateProductsUseCase {
    private $productsRepository;

    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function execute($id, $productData) {
        return $this->productsRepository->update($id, $productData);
    }
}
