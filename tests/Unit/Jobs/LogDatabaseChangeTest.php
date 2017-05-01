<?php

namespace Tests\Unit\Jobs;

use App\Jobs\LogDatabaseChange;
use Carbon\Carbon;
use Tests\TestCase;

class LogDatabaseChangeTest extends TestCase
{

    /** @test */
    public function it_logs_a_record()
    {
        Carbon::setTestNow('2017-05-01 16:10:00');

        \Log::shouldReceive('info')
            ->with('A record action has been made in table name at 2017-05-01 16:10:00.')
            ->once();

        $job = new LogDatabaseChange('name', 'action');

        $job->handle();
    }
}
