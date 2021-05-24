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

Route::get('/','HomeController@index')->name('home');
Route::get('/product/{slug}', 'HomeController@single')->name('product.single');

Route::prefix('cart')->name('cart.')->group(function(){
    Route::get('/', 'CartController@index')->name('index');
    Route::post('add','CartController@add')->name('add');

    Route::get('remove/{slug}','CartController@remove')->name('remove');
    Route::get('cancel','CartController@cancel')->name('cancel');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/model', function(){
    // $products = \App\Product::all(); //select * from products

//    $user = new \App\User();
//    $user = \App\User::find(81);
//    $user->name = 'Usuario Test Editado';
//    $user->save();

    // return $user->save();
    // \App\User:all();
    // \App\User:find(3);
    // \App\User:where('name', 'Nome da Pessoa')->first();
    // \App\User::paginate(10);


    //  Mass Assignment - Atribuição em massa


//    $user = \App\User::create([
//        'name' => 'Nanderson Castro',
//        'email'=> 'email100@email.com',
//        'password' => bcrypt('123345566')
//    ]);

    // Mass Update
//    $user = \App\User::find(42);
//    $user->update([
//        'name' => 'Atualizando com Mass Update'
//    ]); // true ou false

    // Como fazer para pegar a loja de um usuario

    //$user = \App\User::find(4);

    //dd($user->store()->count()); // O objeto unico (store) se for muitos pra muitos, collection de dados (Objetos)

    // pegar os produtos de uma loja?
   // $loja = \App\Store::find(1);
    // return $loja->products(); | $loja->products()->where('id', 9)->get()

    // Pegar as lojas e uma categoria de uma loja?
 //   $categoria = \App\Category::find(1);
 //   $categoria->products;

    //Criar uma loja para um usuário
//    $user = \App\User::find(10);
//    $store = $user->store()->create([
//        'name' => 'Loja Teste',
//        'description' => 'Loja Teste de Produtos de Informática',
//        'mobile_phone' => 'xx-xxxxx-xxxx',
//        'phone' => 'xx-xxxxx-xxxx',
//        'slug' => 'loja-teste',
//    ]);

    //Criar um produto para uma loja
//    $store = \App\Store::find(41);
//    $product = $store->products()->create([
//        'name' => 'Notebook Dell',
//        'description' => 'Core i5 10GB',
//        'body' => 'Qualquer coisa...',
//        'price' => 2999.90,
//        'slug' => 'notebook-dell',
//    ]);

//    dd($product);

    //Criar uma categoria

//    \App\Category::create([
//        'name' => 'Games',
//        'description' => null,
//        'slug' => 'games',
//    ]);

//    \App\Category::create([
//        'name' => 'Notebooks',
//        'description' => null,
//        'slug' => 'notebooks',
//    ]);

//    return \App\Category::all();

// Adicionar um produto para uma categoria ou vice-versa

//    $product = \App\Product::find(49);
//
//    dd($product->categories()->sync([2]));

    return \App\User::all();
});

Route::group(['middleware' => ['auth']], function(){
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function (){

//    Route::prefix('stores')->name('stores.')->group(function(){
//
//        Route::get('/', 'StoreController@index')->name('index');
//        Route::get('/create', 'StoreController@create')->name('create');
//        Route::post('/store', 'StoreController@store')->name('store');
//        Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
//        Route::post('/update/{store}', 'StoreController@update')->name('update');
//        Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
//    });

        Route::resource('stores', 'StoreController');
        Route::resource('products','ProductController');
        Route::resource('categories','CategoryController');

        Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');

    });
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
