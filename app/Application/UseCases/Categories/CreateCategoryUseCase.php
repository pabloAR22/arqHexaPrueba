<?php

namespace App\Application\UseCases\Categories;

use App\Core\Repositories\CategoriesRepository;

class CreateCategoryUseCase {
    private $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function execute($categoryData) {
        return $this->categoriesRepository->create($categoryData);
    }
}
