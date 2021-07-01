<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks/create', [PostController::class, 'create'])->name('posts.create');



    public function store(TaskRequest $request) 
    {
       

        // $requestData = request()->all();
        
        //another syntax
        // $title = request()->title;
        // $description = request()->description;

        $requestData = $request->all();

        // Post::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        // ]);

        Post::create($requestData);
     

        //another syntax
        // $post = new Post;
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->save();

        return redirect()->route('posts.index');
    }

