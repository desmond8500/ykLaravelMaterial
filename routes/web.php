<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'MaterialController@index')->name('materialIndex');
Route::get('/folderlist/{folder?}/{subfolder?}', 'MaterialController@folderlist')->name('materialList');
Route::post('/markdown/{file?}', 'MaterialController@markdown')->name('materialMarkdown');
