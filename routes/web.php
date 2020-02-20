<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'MaterialController@index')->name('materialIndex');
