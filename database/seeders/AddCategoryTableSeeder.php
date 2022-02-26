<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class AddCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['id' => 1, 'name' => 'Thời trang'],
            ['id' => 2, 'name' => 'Mỹ phẩm'],
            ['id' => 3, 'name' => 'Gia dụng'],
            ['id' => 4, 'name' => 'Ăn uống'],
            ['id' => 5, 'name' => 'Thực phẩm chức năng'],
            ['id' => 10, 'name' => 'Khác'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate([
                'name' => $category['name']
            ], $category);
        }
    }
}
