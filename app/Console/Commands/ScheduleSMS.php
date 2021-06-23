<?php

namespace App\Console\Commands;

use App\Lead;
use App\User;
use DateTime;
use Illuminate\Console\Command;
use Twilio;

class ScheduleSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:scheduleSMS';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function handle()
    {
        $leads = Lead::where('status','!=','Business Docs Received')->orWhere('status',null)->get();

        foreach ($leads as $lead)
        {
            if($lead->created_at)
            {
                $user = User::find($lead->user_id);
                $now = new DateTime(now());
                $since_start = $now->diff(new DateTime($lead->created_at));
                $minutes = $since_start->days * 24 * 60;
                $minutes += $since_start->h * 60;
                $minutes += $since_start->i;
                if ($minutes == 300)
                {
                    $message = "";
                    if ($lead->status == "Business Information")
                    {
                        $message = "Hey  ".$user->name.",

We notice you haven’t finished completing your business information. Go here to fast track your application.  www.rainfallfunds.com/business/form. Don’t stall. Funding is limited.

Get your cash today,
									Darren";
                    }
                    if ($lead->status == "Business Docs Needed")
                    {
                        $message = "Hey  ".$user->name.",
We notice you haven’t finished completing your personal information. We need your documents.   Documents needed:
-Front and back of driver’s license. 
-3 months business bank statements for 2021. (March, April, May)
Upload them today at this link: www.rainfallfunds.com/personal/form. 

									Get your cash today,
									Darren	";
                    }

                    if($message != "")
                    {
                        try{
                            Twilio::message(
                                '+1 '.$user->phone_no,
                                $message
                            );
                        }
                        catch (\Exception $ex)
                        {
                        }
                    }
                }
            }
        }

        return 0;
    }
}
