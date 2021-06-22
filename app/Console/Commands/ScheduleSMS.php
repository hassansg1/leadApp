<?php

namespace App\Console\Commands;

use App\Lead;
use App\User;
use DateTime;
use Illuminate\Console\Command;

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
                dd($user->name);
                $now = new DateTime(now());
                $since_start = $now->diff(new DateTime($lead->created_at));
                $minutes = $since_start->days * 24 * 60;
                $minutes += $since_start->h * 60;
                $minutes += $since_start->i;
                if ($minutes < 350 && $minutes > 297)
                {
                    if ($lead->status == "Business Information")
                    {
//                        $message = "Hey  ".use.",
//
//We notice you haven’t finished completing your business information. Go here to fast track your application.  www.rainfallfunds.com/business/form. Don’t stall. Funding is limited.
//
//Get your cash today,
//									Darren";
                    }
                    if ($lead->status == "Business Docs Needed")
                    {
                        dd("sss");
                    }
                    dd($minutes);
                }
                dd($minutes);
            }
        }

        dd($leads);
        return 0;
    }
}
