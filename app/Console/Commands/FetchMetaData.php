<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class FetchMetaData extends Command
{
    protected $signature = 'fetch:metadata';
    protected $description = 'Fetch metadata from an API and cache it for 15 days';

    public function handle()
    {
        $apiUrl = env('API_URL'); // Replace with your API URL
        $apiKey = env('API_KEY'); // Fetch the API key from the .env file

        if (!$apiKey) {
            $this->error('API key is not set in the .env file');
            return;
        }

        $url = $apiUrl . "/company";

        try {
            // Fetch data from API with the API key in the header
            $response = Http::withHeaders([
                'API-KEY' => $apiKey,
            ])->get($url);

            if ($response->ok()) {
                $metadata = $response->json();

                // Cache the response for 15 days
                Cache::put('metadata', $metadata, now()->addDays(15));

                $this->info('Metadata fetched and cached successfully.');
            } else {
                $this->error('Failed to fetch metadata. API responded with: ' . $response->status());
            }
        } catch (\Exception $e) {
            $this->error('An error occurred: ' . $e->getMessage());
        }
    }
}
