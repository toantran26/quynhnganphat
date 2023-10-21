<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    $category = \App\Models\Category::create([
      'title_vi' => 'Giới thiệu',
      'slug' => 'gioi-thieu',
      'top_cate' => 1,
    ]);
    $category = \App\Models\Category::create([
      'title_vi' => 'Dự án',
      'slug' => 'du-an',
      'top_cate' => 2,
    ]);


    $category = \App\Models\Category::create([
      'title_vi' => 'Đối tác khách hàng',
      'slug' => 'doi-tac-khach-hang',
      'top_cate' => 3,
    ]);

    $category = \App\Models\Category::create([
      'title_vi' => 'Blog',
      'slug' => 'blog',
      'top_cate' => 4,
    ]);

    $category = \App\Models\Category::create([
      'title_vi' => 'Tuyển dụng',
      'slug' => 'tuyen-dung',
      'top_cate' => 5,
    ]);
  }
}
