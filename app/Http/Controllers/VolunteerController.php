<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestMedicine;
use App\Models\DonationProcess;
use App\Models\ReceivedDonation;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $current_volunteer=auth()->guard('volunteer')->user();

       $patientRequests=RequestMedicine::whereNull('volunteer_id')->with('patient')->get();
    //    dd($patientRequests->count());
    $requestCount=$patientRequests->count();
    $donationRequests=DonationProcess::whereNull('volunteer_id')->with('benifactor')->get();
    $donationCount=$donationRequests->count();
  
    $donationAccepted=\DB::table('donation_processes')
    ->select(
        'donation_processes.id as don_process',
        'donation_processes.address',
        'donation_processes.benifactor_id',
        'donation_processes.volunteer_id',
        'benifactors.id as benifactorID ',
        'benifactors.name',
        'benifactors.address',
        'benifactors.phonenumber'
    )->whereNotNull('volunteer_id')
    ->where('volunteer_id','=',$current_volunteer->id)
    ->leftJoin('benifactors','donation_processes.benifactor_id','=','benifactors.id')
    ->leftJoin('received_donations','received_donations.donation_process_id','=','donation_processes.id')
    ->whereNull('received_donations.donation_process_id')->get();
    // dd($donationAccepted);
    $donationAcceptedCount=$donationAccepted->count();
   

    $requestAccepted=\DB::table('request_medicines')
    ->select(
        'request_medicines.id as req_process',
        'request_medicines.request_date',
        'request_medicines.patient_id',
        'request_medicines.volunteer_id',
        'patients.id as patientID ',
        'patients.name',
        'patients.address',
        'patients.phonenumber'
    )->whereNotNull('volunteer_id')
    ->where('volunteer_id','=',$current_volunteer->id)
    ->leftJoin('patients','request_medicines.patient_id','=','patients.id')
    ->leftJoin('received_requests','received_requests.request_id','=','request_medicines.id')
    ->whereNull('received_requests.request_id')->get();
    // 
    // dd($requestAccepted);
    $requestAcceptedCount=$requestAccepted->count();
        return view('volunteer',compact('patientRequests','requestCount','donationRequests','donationCount','donationAcceptedCount','donationAccepted','requestAccepted','requestAcceptedCount'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function acceptDonation(Request $request){
        $current_volunteer=auth()->guard('volunteer')->user();
        $donation_process=DonationProcess::where('id',$request->donation_process)
                            ->update(['volunteer_id' => $current_volunteer->id]);
        if($donation_process){
            return redirect()->back()->with('message', 'Accept Donation Request Successfly');

        }
        

    }

    public function acceptRequest(Request $request){
        $current_volunteer=auth()->guard('volunteer')->user();
        $request_process=RequestMedicine::where('id',$request->request_id)
                            ->update(['volunteer_id' => $current_volunteer->id]);
        if($request_process){
            return redirect()->back()->with('message', 'Accept Medication Request Successfly');

        }
        

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
