<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Item;
use App\Payment;
use App\Category;
use App\Image;

class ItemControllerTest extends TestCase
{
    use RefreshDatabase;
    
    public function testIndex()
    {
        $this->withoutExceptionHandling();
        
        // カテゴリーの人気ランキングを作成するためのテストデータを作成
        $categories = $this->seed('CategoriesTableSeeder');
        $items = factory(Item::class, 10)->create()->each(function ($item) {
            factory(Image::class, 2)->create(['item_id' => $item->id]);
        });
        $payments = $items->each(function ($item) {
            factory(payment::class)->create(['item_id' => $item->id]);
        });
        
        // ここまででテストデータ作成終了

        $item = factory(Item::class)->create();

        $response = $this->get(route('item.index'));

        $response->assertStatus(200)
            ->assertViewIs('item.index');
    }

    public function testGuestCreate()
    {
        $response = $this->get(route('item.create'));

        $response->assertRedirect(route('login'));
    }   

    public function testAuthCreate()
    {
        // テストに必要なUserモデルを用意
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get(route('item.create'));

        $response->assertStatus(200)
            ->assertViewIs('item.create');
    }
}
