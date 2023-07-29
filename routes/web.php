<?php

Route::get('/test',function(){

    return App\User::find(1)->profile;
});

Route::get('/', [
    'uses' => 'FrontEndcontroller@index',
    'as'=>'index'
]);

Route::get('/post/{slug}', [
    'uses' => 'FrontEndcontroller@singlepost',
    'as'=>'single.post'
]);

Route::get('/category/{id}', [
    'uses' => 'FrontEndcontroller@category',
    'as'=>'category.single'
]);

Route::get('/tag/{id}', [
    'uses' => 'FrontEndcontroller@tag',
    'as'=>'tag.single'
]);

Route::get('/results', function(){

    $post=\App\Post::where('title','like','%'.request('query').'%')->get();

    return view('results')->with('posts', $post)
                          ->with('setting',\App\Setting::first())
                          ->with('categories',\App\Category::take(4)->get())
                          ->with('tags',\App\Tag::take(4)->get());

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function () {

    Route::get('/post/create',[
        'uses' => 'PostController@create',
        'as' => 'post.create']);
   
    Route::post('/post/store',[
       'uses' => 'PostController@store',
       'as' => 'post.store' ]);

    Route::post('/post/update/{id}',[
       'uses' => 'PostController@update',
       'as' => 'post.update' ]);
       
    Route::get('/post/delete/{id}',[
       'uses' => 'PostController@destroy',
       'as' => 'post.delete' ]);

    Route::get('/post/edit/{id}',[
       'uses' => 'PostController@edit',
       'as' => 'post.edit' ]);
    
    Route::get('/post/kill/{id}',[
       'uses' => 'PostController@kill',
       'as' => 'post.kill' ]);
    
    Route::get('/post/restore/{id}',[
       'uses' => 'PostController@restore',
       'as' => 'post.restore' ]);

    Route::get('/posts',[
            'uses' => 'PostController@index',
            'as' => 'posts']);
            
    Route::get('/posts/trashed',[
            'uses' => 'PostController@trashed',
            'as' => 'posts.trashed']); 

    Route::get('/category/create',[
        'uses' => 'CategoriesController@create',
        'as' => 'category.create']);

    Route::get('/categories',[
        'uses' => 'CategoriesController@index',
        'as' => 'categories']);

    Route::get('/category/edit/{id}',[
        'uses' => 'CategoriesController@edit',
        'as' => 'category.edit']);
    
    Route::get('/category/delete/{id}',[
            'uses' => 'CategoriesController@destroy',
            'as' => 'category.delete']);

    Route::post('/category/store',[
        'uses' => 'CategoriesController@store',
        'as' => 'category.store']);

    Route::post('/category/update/{id}',[
            'uses' => 'CategoriesController@update',
            'as' => 'category.update']);

    Route::get('/tags',[
        'uses' => 'TagsController@index',
        'as' => 'tags']);

    Route::get('/tag/create',[
        'uses' => 'TagsController@create',
        'as' => 'tag.create']);

    Route::get('/tag/edit/{id}',[
        'uses' => 'TagsController@edit',
        'as' => 'tag.edit']);
    
    Route::post('/tag/update/{id}',[
        'uses' => 'TagsController@update',
        'as' => 'tag.update']);

    Route::post('/tag/store',[
        'uses' => 'TagsController@store',
        'as' => 'tag.store']);
    

    Route::get('/tag/delete/{id}',[
        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete']);

    
     Route::get('/users',[
            'uses' => 'UserController@index',
            'as' => 'users']);

    Route::get('/user/create',[
            'uses' => 'UserController@create',
            'as' => 'user.create']);
    
    Route::get('/user/admin/{id}',[
            'uses' => 'UserController@admin',
            'as' => 'user.admin']);

    Route::get('/user/not_admin/{id}',[
            'uses' => 'UserController@not_admin',
            'as' => 'user.not_admin']);

    Route::post('/user/store',[
            'uses' => 'UserController@store',
            'as' => 'user.store']);

    Route::get('/settings',[
            'uses' => 'SettingController@index',
            'as' => 'settings']);

    Route::post('/settings/update',[
            'uses' => 'SettingController@update',
            'as' => 'settings.update'])->middleware('admin');
});

