<?php

namespace App\Application\UseCases\Products;

use App\Core\Repositories\ProductsRepository;

class CreateProductUseCase {
    private $productsRepository;

    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function execute($product) {
        return $this->productsRepository->create($product);
    }
}
