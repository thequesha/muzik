<?php

namespace App\Jobs;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Track;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class FetchData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;

    /**
     * Create a new job instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // TODO: try catch
        Artist::import($this->data['artists']);
        Album::import($this->data['albums']);
        Track::import($this->data['tracks']);

        if (app()->isProduction()) {
            $response = Http::get('https://hp.telecom.tm:8001/api/change_status');
        }
    }
}
