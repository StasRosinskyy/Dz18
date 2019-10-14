<?php

namespace App\Http\Controllers;
use App\post;
use Illuminate\Http\Request;

class postController
{

    public function index(){
        return view('/admin/posts/post_list', ['posts' => \App\Post::all()]);
    }
    public function create(){
        return view('/admin/posts/post_create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'tag_id' => 'required|integer',
            'title' => 'required|min:1|max:25|unique:posts',
            'preview_text' => 'required|min:4|max:25',
            'preview_image' => 'required',
            'preview_cover' => 'required',
            'body' => 'required|min:4|max:255',
        ]);
        $post = new post;
        $post->user_id = $validatedData['user_id'];
        $post->category_id = $validatedData['category_id'];
        $post->title = $validatedData['title'];
        $post->preview_text = $validatedData['preview_text'];
        $post->preview_image = $validatedData['preview_image'];
        $post->preview_cover = $validatedData['preview_cover'];
        $post->body = $validatedData['body'];
        $post->tag()->tag_id = $validatedData['tag_id'];
        $post->save();
        $text = 'Id New post - '. $post->id . " Title New Post - " . $validatedData['title'] .
            " Preview text - " . $validatedData['preview_text'];
        $url = "https://api.telegram.org/bot737755801:AAFtGIFwFbTPen-bCoZ1WhwkU5_1GsET4PY/sendMessage?chat_id=363333093&text=" . $text;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $url);
        return  redirect()->route('posts.index');
    }
    public function show(\App\Post $post){

    }
    public function edit(\App\Post $post){
        return view('/admin/posts/post_update', [
            'post' => $post
        ]);
    }
    public function update(\App\Post $post, Request $request){
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'tag_id' => 'required|integer',
            'title' => 'required|min:1|max:25|unique:posts,title,' . $post->id,
            'preview_text' => 'required|min:4|max:255|unique:posts,preview_text,' . $post->id,
            'preview_image' => 'required',
            'preview_cover' => 'required',
            'body' => 'required|min:4|max:255|unique:posts,body,' . $post->id,
        ]);
        $post->user_id = $validatedData['user_id'];
        $post->category_id = $validatedData['category_id'];
        $post->tag()->tag_id = $validatedData['tag_id'];
        $post->title = $validatedData['title'];
        $post->preview_text = $validatedData['preview_text'];
        $post->preview_image = $validatedData['preview_image'];
        $post->preview_cover = $validatedData['preview_cover'];
        $post->body = $validatedData['body'];
         $post->save();
        return redirect()->route('posts.index');
    }
    public function destroy(\App\Post $post){
        $post->delete();
        return redirect()->route('posts.index');

    }

}
