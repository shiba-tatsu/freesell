<?php

namespace Tests\Feature;

use App\Item;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase;
    
    public function testIsLikedByNull()
    {
        $item = factory(Item::class)->create();

        $result = $item->isLikedBy(null);

        $this->assertFalse($result);
    }

    public function testIsLikedByTheUser()
    {
        $item = factory(Item::class)->create();
        $user = factory(User::class)->create();
        $item->likes()->attach($user);

        $result = $item->isLikedBy($user);

        $this->assertTrue($result);
    }

    public function testIsLikedByAnother()
    {
        $categories = $this->seed('CategoriesTableSeeder');
        $item = factory(Item::class)->create();
        $user = factory(User::class)->create();
        $another = factory(User::class)->create();
        $item->likes()->attach($another);

        $result = $item->isLikedBy($user);

        $this->assertFalse($result);
    }
}
