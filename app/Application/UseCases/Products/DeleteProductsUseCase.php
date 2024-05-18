<?php

namespace App\Application\UseCases\Products;

use App\Core\Repositories\ProductsRepository;

class DeleteProductsUseCase {
    private $productsRepository;

    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function execute($id) {
        return $this->productsRepository->delete($id);
    }
}
