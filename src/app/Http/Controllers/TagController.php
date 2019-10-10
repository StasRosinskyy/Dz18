<?php

namespace App\Http\Controllers;
use App\Tag;
use Illuminate\Http\Request;

class TagController
{

    public function index(){
        return view('/admin/tags/tag_list', ['tags' => \App\Tag::all()]);
    }
    public function create(){
        return view('/admin/tags/tag_create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:25|unique:tags,name',
            'slug' => 'required|min:4|max:25|unique:tags,slug'
        ]);
        $tag = new Tag;
        $tag->name = $validatedData['name'];
        $tag->slug = $validatedData['name'];
        $tag->save();
        return redirect()->route('tags.index');
    }
    public function show(\App\Tag $tag){

    }
    public function edit(\App\Tag $tag){
        return view('/admin/tags/tag_update', [
            'tag' => $tag
        ]);
    }
    public function update(\App\Tag $tag, Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:25|unique:categories,name,' . $tag->id,
            'slug' => 'required|min:4|max:25|unique:categories,slug,' . $tag->id
        ]);
        $tag->name = $validatedData['name'];
        $tag->slug = $validatedData['slug'];
        $tag->save();
        return redirect()->route('tags.index');
    }
    public function destroy(\App\Tag $tag){
        $tag->delete();
        return redirect()->route('tags.index');

    }

}
