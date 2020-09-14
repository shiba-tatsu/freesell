<?php

use Illuminate\Database\Seeder;
use App\Item;
use App\Image;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Item::class, 10)
            ->create()
            ->each(function ($item) {
                $images = factory(App\Image::class, 2)->make();
                $item->images()->saveMany($images);
            });
    }
}
