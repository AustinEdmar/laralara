<?php

use Illuminate\Routing\RouteGroup;

Route::prefix('admin')
        ->namespace('Admin')
        ->group(function () {

        /* rota details */
           Route::get('plans/{url}details', 'DetailPlanController@index')->name('details.plan.index');


            /* rota plans */
    Route::any('plans/search','PlanController@search')->name('plans.search');

    Route::put('plans/{url}', 'PlanController@update')->name('plans.update');

    Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');

    Route::get('plans/create', 'PlanController@create')->name('plans.create');

    Route::delete('plans/{url}','PlanController@destroy')->name('plans.destroy');

    Route::get('plans/{url}','PlanController@show')->name('plans.show');

    Route::post('plans/','PlanController@store')->name('plans.store');

    Route::get('plans', 'PlanController@index')->name('plans.index');

        /* trota HOME */
    Route::get('/', 'PlanController@index')->name('admin.index');

});
/* home */



/* Route::get('/', function () {
    return view('welcome');
});
 */