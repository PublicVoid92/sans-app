<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class dailyEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $fullname;
    public $punchtime;
    public $punchstate;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fullname,$punchtime,$punchstate)
    {
        // $this->data = $email_data;

        $this->fullname = $fullname;
        $this->punchtime = $punchtime;
        $this->punchstate = $punchstate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        $status = array(
                            '0'=>'Check In',
                            '1'=>'Check Out'

                        );

        return $this->subject('Attendance for '.$this->fullname.' '.date("d/m/Y", strtotime($this->punchtime)).'-'.$status[$this->punchstate])->view('dailyemail_template',array(

            'fullname' => $this->fullname,
            'punchtime'=>$this->punchtime,
            'punchstate'=>$this->punchstate


        ));
    }
}
