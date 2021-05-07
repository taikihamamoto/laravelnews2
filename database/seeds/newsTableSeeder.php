<?php

use Illuminate\Database\Seeder;
use App\Models\article;
class newsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(article::class, 3)->create();
    }
}
