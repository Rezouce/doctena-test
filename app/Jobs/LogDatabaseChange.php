<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class LogDatabaseChange implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $table;

    private $action;

    public function __construct(string $table, string $action)
    {
        $this->table = $table;
        $this->action = $action;
    }

    public function handle()
    {
        \Log::info(sprintf(
            'A record %s has been made in table %s at %s.',
                $this->action,
                $this->table,
                Carbon::now()->toDateTimeString()
        ));
    }
}
