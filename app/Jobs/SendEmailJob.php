<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $email_data;
    private $to;
    private $to_name;
    private $subject;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email_data, $to, $to_name, $subject)
    {
        $this->email_data = $email_data;
        $this->to = $to;
        $this->to_name = $to_name;
        $this->subject = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sendDefaultMail($this->email_data, $this->to, $this->to_name, $this->subject);
    }
}
