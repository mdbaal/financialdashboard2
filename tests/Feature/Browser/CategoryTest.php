<?php

use App\Models\Category;
use App\Models\User;

beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

test('Authenticated user is able to view their categories', function () {
    Category::factory()->create(['name' => 'No Category']);

    $page = visit('/dashboard/categories');

    $page->assertSee('Categories');
    $page->assertSee('No Category');
});

test('Authenticated user is able to create a new category', function () {
    $page = visit('/dashboard/categories');

    $page->click('New category')
        ->fill('name', 'Food')
        ->fill('color', '#2f5aff')
        ->click('Save');

    $category = Category::find(1);

    expect($category->name)->toBe('Food')
        ->and($category->color)->toBe('#2f5aff');
});

test('Authenticated user is able to edit a category', function () {
    $category = Category::create(['name' => 'test', 'color' => '#ffffff', 'user_id' => Auth::user()->id]);
    $page = visit('/dashboard/categories');

    $page->click('test')
        ->assertSee('Edit category')
        ->fill('name', 'Food')
        ->fill('color', '#2f5aff')
        ->click('Save');

    $category = Category::find(1);

    expect($category->name)->toBe('Food')
        ->and($category->color)->toBe('#2f5aff');
});

test('Authenticated user is able to delete a category', function () {
    $category = Category::create(['name' => 'test', 'color' => '#ffffff', 'user_id' => Auth::user()->id]);
    $page = visit('/dashboard/categories');

    $page->assertSee('test')
        ->click('.lucide-delete-icon');

    $category = Category::find(1);

    expect($category)->toBeNull();
});
