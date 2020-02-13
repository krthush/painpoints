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

/* Problem routes */
Route::get('/', 'PostController@showProblems')->name('show-problems'); // Shows problems
Route::get('/problems', 'PostController@showProblems')->name('show-problems'); // Shows problems

/* Ideas/Solutions routes */
Route::get('/answers', 'PostController@showAnswers')->name('show-answers'); // Shows answers

/* General post model routes */
Route::post('/create-post', 'PostController@createPost')->name('create-post'); // Create a root post
Route::post('/add-comment', 'PostController@addComment')->name('add-comment'); // Add a comment (non-root post)
Route::post('/update-popularity', 'PostController@updatePopularity')->name('update-popularity'); // Update Popularity

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/welcome', function () {
    return view('pages.welcome');
});
