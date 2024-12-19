<?php

namespace App\Http\Controllers;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;


class HomePageController extends Controller
{
    public function index()
    {

        $metadata = Cache::get('metadata', []);
        $destinations = Cache::get('destinations', []);

        if ($metadata) {
            SEOMeta::setTitle($metadata['title'] ?? 'Default Title');
            SEOMeta::setDescription($metadata['description'] ?? 'Default Description');
            SEOMeta::setKeywords($metadata['seo_keywords'] ?? 'default, keywords');
            OpenGraph::setDescription($metadata['description'] ?? 'Default Description');
            OpenGraph::setTitle($metadata['title']);
            OpenGraph::setUrl(asset('images/opengraph-image.jpg'));
        }


        $data = [
            'meta' => $metadata,
            'destinations' => $destinations,

        ];
        return view('home', $data);
    }

    public function create(Request $request)
    {

        // Step 1: Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|regex:/^\d{10,16}$/',
            'passengers' => 'required|integer|min:1',
            'departure' => "required|string",
            'destination' => "required|string",
            'date' => 'date',
        ]);


        // Step 2: Prepare data for the API
        $apiData = [
            'first_name' => $validatedData['name'],
            'last_name' => 'lastname',
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'] ?? null,
            'departure' => $validatedData['departure'],
            'arrival' => $validatedData['destination'],
            'date_range' => $validatedData['date'],
            'passengers' => $validatedData['passengers'],
        ];

        $apiUrl = env('API_URL');
        $apiKey = env('API_KEY');

        try {
            $url = $apiUrl . '/query';

            // Step 3: Send the data to the external API with the API key
            $response = Http::withHeaders([
                'API-KEY' => $apiKey, // Add your API key to the .env file
            ])->post($url, $apiData);

            Log::info($response);

            if ($response->successful()) {
                // Step 4: Redirect to the "Thank You" page
                return redirect()->route('thankyou')->with('success', 'Your query has been submitted successfully!');
            } else {
                return redirect()->back()->withErrors(['api_error' => $response->json()['error'] ?? 'Failed to submit query.']);
            }
        } catch (\Exception $e) {
            Log::error('API Error: ' . $e->getMessage());
            return redirect()->back()->withErrors(['api_error' => 'An error occurred while submitting your query.']);
        }

    }

}
