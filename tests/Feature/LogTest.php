<?php

namespace Tests\Feature;

use Illuminate\Filesystem\Filesystem;
use Tests\TestCase;

class LogTest extends TestCase
{

    /** @test */
    public function it_outputs_the_logs_entries()
    {
        $fileSystem = \Mockery::mock(Filesystem::class);

        \Storage::shouldReceive('disk')
            ->with('logs')
            ->andReturn($fileSystem);

        $fileSystem->shouldReceive('get')
            ->with('laravel.log')
            ->andReturn("First record.\nSecond record.");

        $response = $this->get('/logs');

        $response->assertStatus(200);
        $response->assertSee('<td>First record.</td>');
        $response->assertSee('<td>Second record.</td>');
    }
}
