<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\lecturerEmail;


class lecturerEmailQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $email;
    public $classid;
    public $classname;
    public $firstname;
    public $fullname;
    public $student_list;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email,$classid,$classname,$firstname,$fullname,$student_list)
    {
        $this->email = $email;
        $this->classid = $classid;
        $this->classname =$classname;
        $this->firstname = $firstname;
        $this->fullname = $fullname;
        $this->student_list = $student_list;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new lecturerEmail($this->classid,$this->classname,$this->firstname,$this->fullname,$this->student_list));
    }
}
