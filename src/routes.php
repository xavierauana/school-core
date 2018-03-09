<?php
/**
 * Author: Xavier Au
 * Date: 9/3/2018
 * Time: 11:20 AM
 */

Route::group([
    'namespace' => "Anacreation\\School\\Http\\Controllers",
], function () {
    Route::group([
        'middleware' => "web",
    ], function () {
        Route::get("languages", "LanguagesController@index");
    });
});