<?php

use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Cache;

Route::get('/', [HomePageController::class, 'index'])->name('home');

Route::post('/query/submit', [HomePageController::class, 'create'])->name('query.submit');

Route::get('/about', function () {
    $metadata = Cache::get('metadata', []);

    if ($metadata) {
        SEOMeta::setTitle('About' ?? 'Default Title');
        SEOMeta::setDescription($metadata['description'] ?? 'Default Description');
        SEOMeta::setKeywords($metadata['seo_keywords'] ?? 'default, keywords');
        OpenGraph::setTitle($metadata['description'] ?? 'Default Description');
    }
    return view('about');
})->name('about');


Route::get('/airlines', function () {
    $metadata = Cache::get('metadata', []);

    if ($metadata) {
        SEOMeta::setTitle('Airlines' ?? 'Default Title');
        SEOMeta::setDescription($metadata['description'] ?? 'Default Description');
        SEOMeta::setKeywords($metadata['seo_keywords'] ?? 'default, keywords');
        OpenGraph::setDescription($metadata['title'] ?? 'Default Title');
        OpenGraph::setTitle($metadata['description'] ?? 'Default Description');
        OpenGraph::setUrl('http://sunshinestravels.co.uk');
        OpenGraph::addImage(asset('images/opengraph-image.jpg'), ['height' => 300, 'width' => 300]);

    }
    return view('airline');
})->name('airlines');

Route::get('/contact', [ContactPageController::class, 'index'])->name('contact');

Route::post('/contact', function () {
    return view('contact');
})->name('submit.contact');


Route::get('/thankyou', function () {
    return view('thankyou');
})->name('thankyou');
