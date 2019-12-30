<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\KeyValue;
use Carbon\Carbon;


class DeleteOldData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:deleteoldvalue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Old Value after 5 minutes from creation';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $keyValues = KeyValue::where('created_at', '<', Carbon::now()->subMinutes(5)->toDateTimeString())->delete();

        logger ("Deleted Old Data \n");
    }
}
