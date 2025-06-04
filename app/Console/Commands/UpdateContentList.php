<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redis;

class UpdateContentList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-content-list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $content_path = resource_path('views/content');

        $files = File::allFiles($content_path);

        foreach ($files as &$file) 
        {
            $file = $file->getRelativePathname();

            $file = preg_replace('/\.blade\.php$/', '', $file);
        }

        $files = json_encode($files);

        Redis::set('content_list', $files);

        $this->info('Content list saved to Redis.');
    }
}
