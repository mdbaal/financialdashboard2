<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\DestroyCategoryRequest;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Auth()->user()->categories;

        return Inertia::render('Categories',
            [
                'categories' => $categories->load('transactions'),
            ]
        );
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        Category::create($validated);

        return redirect(route('categories.index'))
            ->with('success', ['message' => 'Category created', 'duration' => 5000]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();

        $category->name = $validated['name'];
        $category->color = $validated['color'];

        if ($category->isDirty()) {
            $category->save();
        }

        return redirect(route('categories.index'))
            ->with('success', ['message' => 'Category updated', 'duration' => 5000]);
    }

    public function destroy(DestroyCategoryRequest $request)
    {
        $validated = $request->validated();

        Category::find($validated['id'])->delete();

        return redirect(route('categories.index'))
            ->with('success', ['message' => 'Category deleted', 'duration' => 5000]);
    }
}
