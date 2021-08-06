<?php

namespace App\Jobs;

use App\Models\Site;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class IpJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $siteName;

    public function __construct($siteName)
    {
         $this->siteName = $siteName;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (strlen($this->siteName)==0) 
        {
            echo 'no input';
            exit;
         }

         $ip = gethostbyname($this->siteName);

         Site::Create( [
         'site_name' => $this->siteName,
         'site_ip' => $ip
         ]);



    }
}
