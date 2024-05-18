<?php

namespace App\Application\UseCases\Products;

use App\Core\Repositories\ProductsRepository;

class GetAllProductsUseCase {
    private $productsRepository;

    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function execute() {
        return $this->productsRepository->getAll();
    }
}
