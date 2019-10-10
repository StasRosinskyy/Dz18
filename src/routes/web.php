<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/post/{post}', function (\App\Post $post) {
    $post->increment('views');
    return view('post', ['post' => $post]);
})->name('post');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/category/{slug}', function ($slug) {
    $post = \App\Category::where('slug', '=', $slug)->first()->post()->latest()->paginate(10);
    return view('blog', ['posts' => $post]);
})->name('category');

Route::get('/tags/{tag}', function ($slug) {
    $post = \App\Tag::where('slug', '=', $slug)->first()->post()->latest()->paginate(10);
    return view('blog', ['posts' => $post]);
})->name('tags');

Route::get('/author/{author}', function (\App\User $author) {
    $post = $author->post()->latest()->paginate(10);
    return view('blog', ['posts' => $post]);
})->name('posts.by.author');

Route::get('/posts/{date}', function ($date) {
    $post = \App\Post::where('created_at', '=', $date)->paginate(10);
    return view('blog', ['posts' => $post]);
})->name('posts_date'); // для проверки кликните по дате поста в списке блога

Route::get('posts_date_category/{date}+{category}', function ($date, $category) {
    $post = \App\Post::where('created_at', '=', $date)->where('category_id', '=', $category)->paginate(10);
    return view('blog', ['posts' => $post]);
})->name('posts_date_category');  // для проверки введите ссылку типа
// http://localhost:8080/public/posts_date_category/2019-10-08%2000:00:00+1

Route::get('/posts_author_category/{category}+{author}', function ($category, $author) {
    $post = \App\Post::where('user_id', '=', $author)->where('category_id', '=', $category)->paginate(10);
    return view('blog', ['posts' => $post]);
})->name('posts_author_category');// для проверки введите ссылку типа
// http://localhost:8080/public/posts_author_category/1+2
// использую 1+2 потому что если указывать через / то отваливаются фотки и js, т.к. у меня указан "жесткий" путь к файлам
Route::get('/categories', 'CategoryController@index')->name('categories.index');
Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
Route::post('/categories/create', 'CategoryController@store')->name('categories.store');
Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');
Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('categories.edit');
Route::put('/categories/{category}', 'CategoryController@update')->name('categories.update');
Route::delete('/categories/{category}', 'CategoryController@destroy')->name('categories.destroy');

Route::get('/tags_1', 'TagController@index')->name('tags.index');
Route::get('/tags_1/create', 'TagController@create')->name('tags.create');
Route::post('/tags_1/create', 'TagController@store')->name('tags.store');
Route::get('/tags_1/{tag}', 'TagController@show')->name('tags.show');
Route::get('/tags_1/{tag}/edit', 'TagController@edit')->name('tags.edit');
Route::put('/tags_1/{tag}', 'TagController@update')->name('tags.update');
Route::delete('/tags_1/{tag}', 'TagController@destroy')->name('tags.destroy');

Route::get('/posts_1', 'PostController@index')->name('posts.index');
Route::get('/posts_1/create', 'PostController@create')->name('posts.create');
Route::post('/posts_1/create', 'PostController@store')->name('posts.store');
Route::get('/posts_1/{post}', 'PostController@show')->name('posts.show');
Route::get('/posts_1/{post}/edit', 'PostController@edit')->name('posts.edit');
Route::put('/posts_1/{post}', 'PostController@update')->name('posts.update');
Route::delete('/posts_1/{post}', 'PostController@destroy')->name('posts.destroy');

