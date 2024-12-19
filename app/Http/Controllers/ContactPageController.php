<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Cache;


use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function index()
    {

        $metadata = Cache::get('metadata', []);

        if ($metadata) {
            SEOMeta::setTitle('Contact' ?? 'Default Title');
            SEOMeta::setDescription($metadata['description'] ?? 'Default Description');
            SEOMeta::setKeywords($metadata['seo_keywords'] ?? 'default, keywords');
            OpenGraph::setDescription($metadata['description'] ?? 'Default Description');
            OpenGraph::setTitle($metadata['title']);
            OpenGraph::setUrl(asset('images/opengraph-image.jpg'));

        }
        return view('contact');
    }
}
