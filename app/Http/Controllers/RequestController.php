<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\RequestMedicine;
use App\Models\MedicationRequest;
use Auth;
class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medicines=Medicine::where('quantity','<>',0.00)->get();
        return view('request_medicine',compact('medicines'));
    }

    public function myRequestStatus(Request $request)
    {
        $current_user= auth()->guard('patient')->user();
        
        $myrequest=RequestMedicine::where('patient_id','=',$current_user->id)->with('volunteer')->with('medicationRequest.medicine')->get();
//    dd($myrequest);
        return view('request_status',compact('myrequest'));

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
        $current_user= auth()->guard('patient')->user();
        
        if(gettype($current_user)!=="object")
        {
            return redirect('login');
        }
       
        $requestProcess=new RequestMedicine();
        $requestProcess->request_date=$request->date;
        $requestProcess->patient_id=$current_user->id;
        $requestProcess->save();
        if($requestProcess){
        
            for ($i=0; $i < count($request->medicines); $i++) { 
                $MedicationRequest=new MedicationRequest();
                $MedicationRequest->request_id=$requestProcess->id;
                $MedicationRequest->medicine_id=$request->medicines[$i];
                $MedicationRequest->required_quantity=$request->quantities[$i];
                $MedicationRequest->save();
            }
            if($MedicationRequest){
                // send requeest to all closed volunteer
                return redirect()->back()->with('message', 'Medication Request send Successfly WE will send Request for the nearst Volunteer!');
            }
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
