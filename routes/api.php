<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function (){
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('signup', 'AuthController@signup')->name('signup');

    Route::middleware(['auth:api'])->group(function (){
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user')->name("user.detail");

        // Routes for products and category
        Route::apiResources([
            'products','ProductController',
            'categories','CategoryController'
        ]);

        Route::prefix('categories')->group(function (){
            Route::apiResource('/{category}/subcategories','SubCategoryController');
        });

        Route::prefix('products')->group(function (){
            Route::apiResource('/{product}/reviews','ReviewController');
        });
    });

    // Password routes
    Route::prefix('password')->group(function (){
        Route::post('create', 'PasswordResetController@create');
        Route::get('find/{token}', 'PasswordResetController@find');
        Route::post('reset', 'PasswordResetController@reset');
    });


});












/*

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});


Route::group([    
    'namespace' => 'Auth',    
    'middleware' => 'api',    
    'prefix' => 'password'
], function () {    
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});


//Route::resource('categories','Category\CategoryController',['except'=>['create','edit']]);

//Route::resource('categories.products','Category\CategoryController',['except'=>['create','edit']]);

//Route::resource('categories.subcategories','Category\SubCategoryController',['except'=>['create','edit']]);

//Route::resource('categories.subcategories.products','Category\CategoryController',['except'=>['create','edit']]);

//Route::resource('subcategories','Category\SubCategoryController',['except'=>['create','edit']]);

//Route::resource('subcategories.products','Category\ProductSubCategoriesController',['only'=>['index']]);

//Route::resource('categories.subcategories.products','Category\ProductSubCategoriesController',['only'=>['index']]);



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('/products','ProductController');


Route::group(['prefix'=>'products'],function(){

	Route::apiResource('/{product}/reviews','ReviewController');
});

Route::apiResource('/categories','CategoryController');


Route::group(['prefix'=>'categories'],function(){

    Route::apiResource('/{category}/subcategories','SubCategoryController');
    //Route::apiResource('/{category}/subcategories/{subcategory}','SubCategoryController@show');

  
});

//Route::apiResource('/subcategories','SubCategoryController');
// Route::group(['prefix'=>'subcategories'],function(){

//     Route::apiResource('/{subcategory}/products','SubCategoryController');
//     //Route::apiResource('/{category}/subcategories/{subcategory}','SubCategoryController@show');

  
// });


//Route::resource('subcategories.products','SubCategoryController',['only'=>['index']]);


//>>> App\ModelCat\SubCategory::find(1)->products
//>>> App\ModelCat\Category::find(1)->SubCategories


*/
