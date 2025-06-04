<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

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

        foreach ($files as $file) 
        {
            $relative_path = $file->getRelativePathname();
          
            $this->info($relative_path);
        }
    }
}
