<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Repositories\Eloquent\Company;
use Repositories\Eloquent\Event;

class MailController extends Controller
{
    private $company;

    private $event;

    private $mailData = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(Company $company, Event $event)
    {
        $this->company = $company;

        $this->event = $event;
    }

    /**
     * Sending Mail To Companies Administrators
     */
    public function index()
    {
        /*
         * Its better to use query criteria here with Event date and send mail.
         * But I am iterating through all companies taht is not good programming practice.
         * But I have many solutions for better query.
         */
        $companies = $this->company->all();
        foreach($companies as $company){
            $this->mailData = []; //reset mail data
            $users = $company->users->all();
            foreach($users as $user){
                $stands = $user->stands->all();
                foreach($stands as $stand){
                    if($stand->hall->location->event->mail_sent){
                        //do nothing
                    }else{
                        if(strtotime($stand->hall->location->event->end_date_time)<=time()){
                            $this->mailData[] =
                                [
                                    'event' => $stand->hall->location->event->name,
                                    'user_name' => $user->name,
                                    'user_email' => $user->email,
                                    'reserved_stand' => url('location/'.$stand->hall->location->id.'/stand-reservation/'.$stand->id),
                                ];
                            $event = $this->event->find($stand->hall->location->event->id);
                            $event->mail_sent = true;
                            $event->save(); //don't send mail again
                        }
                    }

                }

            }
            $this->sendMail($company->email);
        }
    }

    private function sendMail($companyEmail){
        if(!empty($this->mailData)){
            Mail::send('emails.report', ['data'=>$this->mailData], function ($message) use ($companyEmail) {
                $message->from('admin@vea.com', config('app.name', 'Exposition Application'));

                $message->to($companyEmail)->subject('Exposition Application Report');
            });
            echo "Mail Sent to $companyEmail \n"; //better to log data in file
        }

    }
}
