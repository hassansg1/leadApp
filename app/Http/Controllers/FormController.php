<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Buisness;
use App\Lead;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Twilio;

class FormController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $user = User::where('phone_no', $request->whatis2['0'])->first();
        if ($user) {
            Session::flash('message', "A user is already registered with the given phone number...!!!");
            return Redirect::back();
        }

        $user = User::create([
            'first_name' => $request->whatis['0'],
            'last_name' => $request->whatis['1'],
            'phone_no' => $request->whatis2['0'],
        ]);

        Buisness::create([
            'user_id' => $user->id
        ]);

        Lead::create([
            'user_id' => $user->id,
            'business_span' => $request->howlong5,
            'loan_size' => $request->whatsize,
            'status' => 'Business Information'
        ]);

        $message = "Hi " . $request->whatis['0'] . " " . $request->whatis['1'] . ",
        Your RainFall application has been received. A few more questions about your business are needed:   www.rainfallfunds.com/business/form.
        Complete now, loans are going fast! Only $50 million will be lended out! - TTYL Darren";


        Twilio::message(
            '+1 '.$user->phone_no,
            $message
        );

        return view('success');
        //
    }

    public function storeFormTwo(Request $request)
    {
        $user = User::where('phone_no', $request->q23_enterYour['full'])->first();
        if(!$user)
        {
            Session::flash('message', "No User is registered with the given phone number...!!!");
            return Redirect::back();
        }
        $business = Buisness::where('user_id', $user->id);
        $lead = Lead::where('user_id', $user->id)->first();

        $business->update([
            'name' => $request->q1_whatIs,
            'address' => $request->q2_whatIs2['addr_search'],
            'address_line1' => $request->q2_whatIs2['addr_line1'],
            'address_line2' => $request->q2_whatIs2['addr_line2'],
            'city' => $request->q2_whatIs2['city'],
            'postal' => $request->q2_whatIs2['postal'],
            'country' => $request->q2_whatIs2['country'],
            'business_industry' => $request->q16_whatIndustry,
            'business_type' => $request->q26_whatType26,
            'business_start_date' => date('Y-m-d', strtotime($request->q27_whenDid27['month'] . "/" . $request->q27_whenDid27['day'] . "/" . $request->q27_whenDid27['year'])),
            'ppp_loan' => $request->q25_didYou25,
            'ppp_fund_amount' => $request->q18_howMuch,
            'ppp_loan_forgiven' => $request->q24_hasYour24,
            'revenue' => $request->q20_in2021,
        ]);

        $lead->status = "Business Docs Needed";
        $lead->save();

        $message = "Fantastic News {insert name}, 

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


        Twilio::message(
            '+1 ' . $user->phone_no,
            $message
        );

        return view('success');
        //
    }

    public function submitFormThree(Request $request)
    {
        $user = User::where('phone_no', $request->enteryour['0'])->first();
        if(!$user)
        {
            Session::flash('message', "No User is registered with the given phone number...!!!");
            return Redirect::back();
        }
        $lead = Lead::where('user_id', $user->id)->first();


        $user->email = $request->enteryour21;
        $user->home_address = $request->whatis[0];
        $user->address_line1 = $request->whatis[1];
        $user->city = $request->whatis[3];
        $user->state = $request->whatis[2];
        $user->postal = $request->whatis[4];
        $user->country = $request->whatis[5];
        $user->dob = date('Y-m-d', strtotime($request->whatis4['0'] . "/" . $request->whatis4['1'] . "/" . $request->whatis4['2']));
        $user->ein = $request->whatis7[0];
        $user->ssn = $request->whatis9[0];
        $user->business_percentage = $request->whatpercentage;
        $user->terms_and_conditions = $request->typea;
        $user->save();

        Attachment::create(
            ['name' => 'salary_slip_one', 'file' => $request->uploadmarch15[0], 'user_id' => $user->id]
        );
        Attachment::create(
            ['name' => 'salary_slip_two', 'file' => $request->uploadapril[0], 'user_id' => $user->id]
        );
        Attachment::create(
            ['name' => 'front_driver_liscence', 'file' => $request->uploadthe[0], 'user_id' => $user->id]
        );
        Attachment::create(
            ['name' => 'back_driver_liscence', 'file' => $request->uploadthe17[0], 'user_id' => $user->id]
        );
        Attachment::create(
            ['name' => 'salary_slip_three', 'file' => $request->uploadmay[0], 'user_id' => $user->id]
        );

        $lead->status = "Business Docs Received";
        $lead->save();


        $message = "Great job {insert name}! 

We have your business documents. Look out for your closing loan documents. They should arrive in 24-48 hours. If we need anything else, I will reach out to you directly.

									Talk to you soon,
										Darren";

        Twilio::message(
            '+1 ' . $user->phone_no,
            $message
        );

        return view('success');
    }

}
