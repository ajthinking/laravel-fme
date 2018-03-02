<?php

use Ajthinking\LaravelFME\FMEServer;

Route::get('/fme/{workspace}/datadownload', function($workspace) {
    $fmeServer = new FMEServer;
    return $fmeServer->dataDownload($workspace);
});

Route::get('/fme/jobs/{id}', function($id) {
    $fmeServer = new FMEServer;    
    return $fmeServer->jobStatus($id);
});


Route::get('/fme/test', function() {
    return "ajthinking/laravel-fme installed and modified succesfully";
});



/*
kartor.helsingborg.se/dwg
composer require ajthinking/fme
route is now exposed as kartor.helsingborg.se/dwg/fme/workspace/datadownload
OR POST /transformations/submit/< repository >/< workspace >
*/
