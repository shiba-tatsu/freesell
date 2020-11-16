<?php

namespace Tests\Feature;

use App\Item;
use App\User;
use App\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    public function testIsLikedByNull()
    {
        $categories = factory(Category::class, 10)->create();
        $item = factory(Item::class)->create(['category_id' =>  $categories[0]->id]);

        $result = $item->isLikedBy(null);

        $this->assertFalse($result);
    }

    public function testIsLikedByTheUser()
    {
        $categories = factory(Category::class, 10)->create();
        $item = factory(Item::class)->create(['category_id' =>  $categories[0]->id]);
        $user = factory(User::class)->create();
        $item->likes()->attach($user);

        $result = $item->isLikedBy($user);

        $this->assertTrue($result);
    }

    public function testIsLikedByAnother()
    {
        
        $categories = factory(Category::class, 10)->create();
        $item = factory(Item::class)->create(['category_id' =>  $categories[0]->id]);
        $user = factory(User::class)->create();
        $another = factory(User::class)->create();
        $item->likes()->attach($another);

        $result = $item->isLikedBy($user);

        $this->assertFalse($result);
    }
}
