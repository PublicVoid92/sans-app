<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class powerschoolEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('powerschool_email')->attach(public_path().'/storage/powerschool_attendance/'.date('dmy').'.xlsx',[
                                                                                                    'as'=>'daily_attendance.xlsx',
                                                                                                    'mime'=>'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'


                                                                                                    ]);

    }
}
