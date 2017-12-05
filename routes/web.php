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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/debug', function () {
    
        $debug = [
            'Environment' => App::environment(),
            'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
        ];
    
        /*
        The following commented out line will print your MySQL credentials.
        Uncomment this line only if you're facing difficulties connecting to the
        database and you need to confirm your credentials. When you're done
        debugging, comment it back out so you don't accidentally leave it
        running on your production server, making your credentials public.
        */
        #$debug['MySQL connection config'] = config('database.connections.mysql');
    
        try {
            $databases = DB::select('SHOW DATABASES;');
            $debug['Database connection test'] = 'PASSED';
            $debug['Databases'] = array_column($databases, 'Database');
        } catch (Exception $e) {
            $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
        }
    
        dump($debug);
    });

Route::get('/posters/breakeven', 'BreakevenController@display');
Route::post('/posters', 'BreakevenController@calculate');

Route::get('/posters/create', 'PosterController@create');
Route::post('/posters', 'PosterController@store');

#show the form to edit a specific poster
Route::get('/posters/{id}/edit', 'PosterController@edit');
#process the form to edit a specific poster
Route::put('/posters/{id}', 'PosterController@update');

#show the confirmation page before deletion
Route::get('/posters/{id}/delete', 'PosterController@delete');
#process the deletion
Route::put('/posters/{id}', 'PosterController@confirm');

Route::get('/posters/index', 'PosterController@index');
Route::get('/posters/{id}', 'PosterController@show');

