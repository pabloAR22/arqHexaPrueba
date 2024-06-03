<?php

namespace App\Application\UseCases\Categories;

use App\Core\Repositories\CategoriesRepository;

class GetAllCategoriesUseCase {
    private $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function execute() {
        return $this->categoriesRepository->getAll();
    }
}
