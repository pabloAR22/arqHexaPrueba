<?php

namespace App\Infraestructure\Repositories;

use App\Core\Contracts\ExternalAdapterContract;
use App\Core\Entities\Product;
use App\Core\Entities\products_x_categories;
use App\Core\Repositories\ProductsRepository;

class EloquentProductsRepository implements ProductsRepository {

    public function findById($id) {
         return Product::find($id);
    }

    public function getAll( array $filters) {
        $query = Product::where('stock', '>=', '1');

        if (isset($filters['price'])) {
            $query->where('price', '=', $filters['price']);
        }

        $availableProducts = $query->get();
        $availableProductsList = [];

        foreach ($availableProducts as $product) {
            $availableProductsList[] = [
                'name' => $product->name,
                'stock' => $product->stock,
                'price' => $product->price,
                'created_at' => $product->created_at,
            ];
        }

        return $availableProductsList;
    }

    public function create($productData) {
        $product = new Product([
            'name' => $productData->name,
            'price' => $productData->price,
            'stock' => $productData->stock,
        ]);

        $product->save();

        $categories = new products_x_categories([
            'id_product' => $product->id,
            'id_category' => $productData->categories
        ]);

        $categories->save();

        return $product;
    }

    public function update($id, $productData) {
        $product = Product::findOrFail($id);

        $product->name = $productData->name;
        $product->price = $productData->price;
        $product->stock = $productData->stock;
        $product->save();

        return $product;
    }

    public function delete($id) {
        $product = Product::findOrFail($id);

        $product->delete();
        return $product;
    }
}
