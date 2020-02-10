<?php

Route::prefix('admin')->name('admin.')->middleware(['web','auth'])->group(function () {

    Route::post('/image/upload', 'EmreBaskin\Eadmin\Controllers\ImageController@upload')->name('image.upload');
    Route::post('/image/delete/{id}', 'EmreBaskin\Eadmin\Controllers\ImageController@delete')->name('image.delete');

});
