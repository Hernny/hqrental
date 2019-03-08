<?php

namespace App\Jobs;

use App\Test;
use App\Mail\TestMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TestMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 120;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 5;

    /**
     * the test class instance.
     *
     * @var Test
     */
    public $test;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Test $test)
    {
        $this->test = $test;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Mail::to('hernny.malaver@gmail.com')->send(new TestMail($this->test));   
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
