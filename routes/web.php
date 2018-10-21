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



Auth::routes();

Route::get('/','FrontEndController@index')->name('frontEnd');
Route::get('/post/{slug}','FrontEndController@singlePost')->name('SinglePost');
Route::get('/category/{id}','FrontEndController@allCategory')->name('AllCategory');
Route::get('/tag/{id}','FrontEndController@allTags')->name('AllTags');

Route::post('/subscription',function (){
    $email= request('email');
    Newsletter::subscribe($email);
    session()->flash('success','Subscription done');
    return redirect()->back();
})->name('subscritionForm');

Route::get('/results',function (){
    $posts=\App\Post::where('title','like','%'.request('query').'%')->get();

    return view('frontEnd.results')->with('posts',$posts)
                                        ->with('title','Search results: '. request('query'))
                                        ->with('settings',\App\Setting::first())
                                        ->with('categories',\App\Category::take(5)->get())
                                        ->with('query',request('query'));
})->name('SearchForm');

// Admin Routes
Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::get('/categories','CategoriesController@index')->name('categories');
    Route::get('/category/create','CategoriesController@create')->name('CategoryCreate');
    Route::post('/category/save','CategoriesController@store')->name('category.store');
    Route::get('/category/edit/{id}','CategoriesController@edit')->name('category.edit');
    Route::post('/category/update/{id}','CategoriesController@update')->name('category.update');
    Route::get('/category/delete/{id}','CategoriesController@destroy')->name('category.delete');

    //Posts
    Route::get('/posts','PostsController@index')->name('AllPosts');
    Route::get('/post/create', 'PostsController@create')->name('PostCreate');
    Route::post('/post/save', 'PostsController@store')->name('PostStore');
    Route::get('/post/edit/{id}', 'PostsController@edit')->name('post.edit');
    Route::post('/post/update/{id}', 'PostsController@update')->name('postUpdate');
    Route::get('/post/trash/{id}', 'PostsController@destroy')->name('post.trash');
    Route::get('/post/deleted', 'PostsController@deletedPosts')->name('DeletedPosts');
    Route::get('/post/restore/{id}', 'PostsController@restorePost')->name('restorePost');
    Route::get('/post/kill/{id}', 'PostsController@killPost')->name('killPost');

    //Tags
    Route::get('/tags','TagsController@index')->name('Tags');
    Route::get('/tag/create','TagsController@create')->name('createTag');
    Route::post('/tag/save','TagsController@store')->name('saveTag');
    Route::get('/tag/edit/{id}','TagsController@edit')->name('editTag');
    Route::post('/tag/update/{id}','TagsController@update')->name('updateTag');
    Route::get('/tag/delete/{id}','TagsController@destroy')->name('deleteTag');


    //Users
    Route::get('/users','UsersController@index')->name('Users');
    Route::get('/user/create','UsersController@create')->name('createUser');
    Route::post('/user/save','UsersController@store')->name('saveUser');



    Route::get('/user/make/admin/{id}','UsersController@makeAdmin')->name('makeAdmin');
    Route::get('/user/remove/admin/{id}','UsersController@removeAdmin')->name('removeAdmin');

    //Profile
    Route::get('/edit/profile','ProfilesController@index')->name('editProfile');
    Route::post('/update/profile','ProfilesController@profileUpdate')->name('profileUpdate');
    Route::get('/delete/user/{id}','ProfilesController@destroy')->name('userDelete');


    //Settings
    Route::get('/settings','SettingsController@index')->name('Settings');
    Route::post('/settings/update/{id}','SettingsController@update')->name('updateSettings');

});

