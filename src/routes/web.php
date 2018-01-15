<?php

use Ajthinking\LaravelFME\FMEServer;

Route::get('/test', function() {
    $fmeServer = new FMEServer;
    return $fmeServer->dataDownload();
});

Route::get('/fme/workspace/{workspace}', function() {
    $fmeServer = new FMEServer;
    return $fmeServer->dataDownload();
});


/*

kartor.helsingborg.se/dwg
composer require ajthinking/fme
route is now exposed as kartor.helsingborg.se/dwg/fme/workspace/datadownload

*/
