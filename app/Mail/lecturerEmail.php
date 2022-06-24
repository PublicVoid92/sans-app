<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class lecturerEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $classid;
    public $classname;
    public $firstname;
    public $fullname;
    public $student_list;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($classid,$classname,$firstname,$fullname,$student_list)
    {
        $this->classid = $classid;
        $this->classname =$classname;
        $this->firstname = $firstname;
        $this->fullname = $fullname;
        $this->student_list = $student_list;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->classname.' '.'Attendance -'.' '.date('d-m-Y'))->view('lectureremail_template',array(

            'classid'=>$this->classid,
            'classname'=>$this->classname,
            'firstname'=>$this->firstname,
            'fullname'=>$this->fullname,
            'student_list'=> $this->student_list



        ));
    }
}
