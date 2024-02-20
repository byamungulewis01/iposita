<?php

namespace App\Jobs;

use App\Mail\CustomMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CustomMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected string $message;
    protected string $email;
    protected string $subject;
    public function __construct($message,$email,$subject)
    {
        //
        $this->message=$message;
        $this->email=$email;
        $this->subject=$subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $data["message"]=$this->message;
        Mail::to($this->email)->send(new CustomMail($data,$this->subject));
    }
}
