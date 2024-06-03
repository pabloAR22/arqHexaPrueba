<?php

namespace App\Application\UseCases\Categories;

use App\Core\Repositories\CategoriesRepository;

class UpdateCategoriesUseCase {
    private $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function execute($id, $categoryData) {
        return $this->categoriesRepository->update($id, $categoryData);
    }
}
