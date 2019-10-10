<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController
{

    public function index(){
        return view('/admin/categories/category_list', ['categories' => \App\Category::all()]);
    }
    public function create(){
        return view('/admin/categories/category_create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:25|unique:categories,name',
            'slug' => 'required|min:4|max:25|unique:categories,slug'
        ]);
        $category = new Category;
        $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $category->save();
        return redirect()->route('categories.index');
    }
    public function show(\App\Category $category){

    }
    public function edit(\App\Category $category){
        return view('/admin/categories/category_update', [
            'category' => $category
        ]);
    }
    public function update(\App\Category $category, Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:25|unique:categories,name,' . $category->id,
            'slug' => 'required|min:4|max:25|unique:categories,slug,' . $category->id
        ]);
        $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $category->save();
        return redirect()->route('categories.index');
    }
    public function destroy(\App\Category $category){
        $category->delete();
        return redirect()->route('categories.index');

    }

}
