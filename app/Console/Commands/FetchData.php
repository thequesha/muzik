<?php

namespace App\Console\Commands;

use App\Jobs\FetchData as JobsFetchData;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Track;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetching album/artist/track information from source server';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // TODO: make it error prone

        $response = Http::acceptJson()->get('https://hp.telecom.tm:8001/api/get_data');

        if (!$response->successful()) {
            return;
        }

        // TODO:validate this
        $data = $response->json();


        JobsFetchData::dispatch($data);

        // dd($response->json());
    }
}
