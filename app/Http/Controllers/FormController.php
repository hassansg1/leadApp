<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Buisness;
use App\Lead;
use App\User;
use Illuminate\Http\Request;
use Twilio;

class FormController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'first_name' => $request->q1_whatIs['first'],
            'last_name' => $request->q1_whatIs['last'],
            'phone_no' => $request->q2_whatIs2['full'],
        ]);

        Buisness::create([
            'user_id' => $user->id
        ]);

        Lead::create([
            'user_id' => $user->id,
            'business_span' => $request->q5_howLong5,
            'loan_size' => $request->q4_whatSize,
            'status' => 'Business Information'
        ]);


        Twilio::message(
            '+1 '.$request->q2_whatIs2['full'],
            'Click the link to submit Business Information '. url('/form/business_info')
        );

        return view('success');
        //
    }

    public function storeFormTwo(Request $request)
    {
        $user = User::where('phone_no', $request->q23_enterYour['full'])->first();
        $business = Buisness::where('user_id', $user->id);
        $lead = Lead::where('user_id', $user->id)->first();

        $business->update([
            'name' => $request->q1_whatIs,
            'address' => $request->q2_whatIs2['addr_search'],
            'address_line1' =>$request->q2_whatIs2['addr_line1'] ,
            'address_line2' => $request->q2_whatIs2['addr_line2'],
            'city' =>$request->q2_whatIs2['city'] ,
            'postal' =>$request->q2_whatIs2['postal'] ,
            'country' => $request->q2_whatIs2['country'],
            'business_industry' => $request->q16_whatIndustry,
            'business_type' => $request->q26_whatType26,
            'business_start_date' => date('Y-m-d',strtotime($request->q27_whenDid27['month']."/".$request->q27_whenDid27['day']."/".$request->q27_whenDid27['year'])),
            'ppp_loan' => $request->q25_didYou25,
            'ppp_fund_amount' => $request->q18_howMuch,
            'ppp_loan_forgiven' => $request->q24_hasYour24,
            'revenue' => $request->q20_in2021,
        ]);

        $lead->status = "Business Docs Needed";
        $lead->save();


        Twilio::message(
            '+1 '.$request->q23_enterYour['full'],
            'Click the link to submit Business Documents Information '. url('/form/business_info')
        );

        return view('success');
        //
    }

    public function submitFormThree(Request $request)
    {
        $user = User::where('phone_no', $request->enteryour['0'])->first();
        $lead = Lead::where('user_id', $user->id)->first();


        $user->email = $request->enteryour21;
        $user->home_address = $request->whatis[0];
        $user->address_line1 = $request->whatis[1];
        $user->city = $request->whatis[3];
        $user->state = $request->whatis[4];
        $user->postal = $request->whatis[5];
        $user->country = $request->whatis[6];
        $user->dob = date('Y-m-d',strtotime($request->whatis4['0']."/".$request->whatis4['1']."/".$request->whatis4['2']));
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


        Twilio::message(
            '+1 '.$request->q23_enterYour['full'],
            'Form is submitted successfully'
        );

        return view('success');
    }

}
