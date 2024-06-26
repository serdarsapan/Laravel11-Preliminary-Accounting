<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;




class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->dummyData() as $key) {
           $blog = Blog::updateOrCreate([
                'user_id' => $key['user_id'],
                'type' => $key['type'],
                'slug' => $key['slug'],
                'barcode' => $key['barcode'],
                'code' => $key['code'],
                'name' => $key['name'],
                'stockUse' => $key['stockUse'],
                'tags' => $key['tags'],
                'kdv' => $key['kdv'],
                'origin' => $key['origin'],
                'description' => $key['description'],
                'stockLeftOver' => $key['stockLeftOver'],
                'stockStatus' => $key['stockStatus'],
                'balanceSumIn' => $key['balanceSumIn'],
                'balanceSumOut' => $key['balanceSumOut'],
                'averageUnCost' => $key['averageUnCost'],
            ]);
           BlogCategory::insert([
               'blog_id' => $blog->id,
               'category_id' => 1
           ]);
          

        }
    }

    /**
     * @return array[]
     */
    public function dummyData(): array
    {
        return [
            1 => [
                'user_id' => 1,
                'type' => 'Hizmet',
                'slug' => '1',
                'barcode' => '',
                'code' => 'HZM00004',
                'name' => 'Tanıtım  Yazısı Bedeli',
                'stockUse' => '',
                'tags' => 'Tanıtım  Yazısı Bedeli',
                'kdv' => 20,
                'origin' => '',
                'description' => '',
                'stockLeftOver' => 3,
                'stockStatus' => 'Normal',
                'balanceSumIn' => 10.000,
                'balanceSumOut' => 49.583,
                'averageUnCost' => 6.197,
                'status' => 1
            ],
            2 => [
                'user_id' => 2,
                'type' => 'Ürün',
                'slug' => '2',
                'barcode' => '',
                'code' => 'URN000003',
                'name' => 'Arama Motoru Optimizasyonu',
                'stockUse' => '',
                'tags' => 'SEO',
                'kdv' => 20,
                'origin' => '',
                'description' => 'SEO',
                'stockLeftOver' => 3,
                'stockStatus' => 'Negatif Stok',
                'balanceSumIn' => 28.000,
                'balanceSumOut' => 0,
                'averageUnCost' => 0,
                'status' => 1
            ],


        ];
    }
}