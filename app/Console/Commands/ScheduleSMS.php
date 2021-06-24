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
                $since_start = $now->diff(new DateTime($lead->updated_at));
                $minutes = $since_start->days * 24 * 60;
                $minutes += $since_start->h * 60;
                $message = "";
                $minutes += $since_start->i;
                if ($minutes == 300)
                {
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


                }
                if ($minutes == 90)
                {
                    if ($lead->status == "Business Docs Needed(Pending)")
                    {
                        $message = "Fantastic News ".$user->name.", 

        You qualify for a business loan! Now we need to verify your information. Upload your documents here: www.rainfallfunds.com/personal/form. 
        What we need:
            -Front and back of driver’s license. 
            -3 months business bank statements for 2021. (March, April, May)
        
        Next steps after receiving your documents:  
             1. We finalize your information. (generally takes 24-48 hours) 
             2. You receive your loan documents to sign.
             3. You sign the loan documents. 
              4. You get funded. (normally in 24 hours)
                                              Let's get you funded,
                                                           Darren";
                        $lead->status = "Business Docs Needed";

                        $lead->save();
                    }


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

        return 0;
    }
}
