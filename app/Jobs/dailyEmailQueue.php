<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\dailyEmail;
use App\Models\db_model;

class dailyEmailQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    // public $email_data;
    public $empid;
    public $fullname;
    public $punchtime;
    public $punchstate;
    public $primary_email;
    public $secondary_email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($empid,$fullname,$punchtime,$punchstate,$primary_email,$secondary_email)
    {
        // $this->email_data = $email_data;
        $this->empid = $empid;
        $this->fullname=$fullname;
        $this->punchtime=$punchtime;
        $this->punchstate=$punchstate;
        $this->primary_email=$primary_email;
        $this->secondary_email=$secondary_email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // add subject
            $db_model = new db_model;

            Mail::to($this->primary_email)->cc($this->secondary_email)->send(new dailyEmail($this->fullname,$this->punchtime,$this->punchstate));
    
            if( count(Mail::failures()) > 0 ) {

                $db_model->update_dailyemail_error($this->empid);
            //success
            } else {
                $db_model->update_dailyemail_success($this->empid);
            }  
            $primary_email[] = array();
            $carbon_copy[] = array();
        
    }
}
