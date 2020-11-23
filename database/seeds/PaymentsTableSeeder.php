<?php

use Illuminate\Database\Seeder;
use App\Item;
use App\Image;
use App\Payment;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = factory(Item::class, 30)->create()
            ->each(function ($item) {
            factory(Image::class, 2)->create(['item_id' => $item->id]);
        });
        $payments = $items->each(function ($item) {
            factory(payment::class)->create(['item_id' => $item->id]);
        });
    }
}
