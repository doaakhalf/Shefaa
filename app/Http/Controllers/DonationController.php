<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Medicine;
use App\Models\DonationProcess;
use App\Models\DonationMedication;
use App\Models\ReceivedDonation;
use App\Models\ReceivedRequest;
use App\Models\RequestMedicine;
use App\Models\MedicationRequest;
class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function donationprocess()
    {
        //
// $current_user=Auth::user();
        // $current_user= auth()->guard('benifactor')->user();
        $medicines=Medicine::all();
        return view('donation',compact('medicines'));
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
        // $current_user=Auth::user();
        $current_user= auth()->guard('benifactor')->user();
        $donationProcess=new DonationProcess();
        $donationProcess->address=$request->address;
        $donationProcess->date=$request->date;
        $donationProcess->benifactor_id=$current_user->id;
        $donationProcess->save();
        if($donationProcess){
            for ($i=0; $i < count($request->medicines); $i++) { 
                $donationMedication=new DonationMedication();
                $donationMedication->donation_process_id=$donationProcess->id;
                $donationMedication->medicine_id=$request->medicines[$i];
                $donationMedication->quantity=$request->quantities[$i];
                $donationMedication->save();
            }
            if($donationMedication){
                // send requeest to all closed volunteer
                return redirect()->back()->with('message', 'Medication Process send Successfly WE will send Request for the nearst Volunteer!');
            }
          
        }

       
    }

    public function recievedDonation(Request $request)
    {
        $DonationProcess=DonationProcess::where('id',$request->donation_process)->first();
        // dd($DonationProcess);
        $donMedication=DonationMedication::where('donation_process_id','=',$DonationProcess->id)->with('medicine')->get();
    //   dd($donMedication);
      for ($j=0; $j < count($donMedication); $j++) { 
          # code...
          for ($i=0; $i < count($donMedication[$j]->medicine); $i++) { 
            # code...
            $medici=Medicine::where('id',$donMedication[$j]->medicine[$i]->id)->first();
            $medi=Medicine::where('id',$donMedication[$j]->medicine[$i]->id)

            ->update(['quantity' => ($donMedication[$j]->medicine[$i]->quantity+$medici->quantity)]);
        }
      }
     
     
        $donation=new ReceivedDonation();
        $donation->address=$request->address;
        $donation->donation_process_id=$request->donation_process;
        $donation->date=$request->date;
        $donation->save();
        if($donation){
            return redirect()->back()->with('message', 'donation process Received  Successfly ');

        }

    }

    
    public function addNewMedicineform(Request $request)
    {
        
        return view('AddNewMedicine');

    } 
    public function AddMedicine(Request $request)
    {
        $validatedData = $request->validate([
            
            'name' => 'required|unique:medicines',
           
        ]);
        $newmedicine=new Medicine();
        $newmedicine->name=$request->name;
        $newmedicine->type=$request->type;
        $newmedicine->quantity=0;
        $newmedicine->save();
        return redirect('donation_process');

    }
    public function myDonationStatus(Request $request)
    {
        $current_user= auth()->guard('benifactor')->user();
        $mydonation=DonationProcess::where('benifactor_id','=',$current_user->id)->with('volunteer')->with('donationMedication.medicine')->get();
//    dd($mydonation);
        return view('donation_status',compact('mydonation'));

    }
    

    
    public function requierdMedicine(Request $request)
    {
        $medicines=Medicine::where('quantity','=',0.00)->get();
        return view('requierdMediceines',compact('medicines'));

    }
    public function recievedRequest(Request $request)
    {
        $requestProcess=RequestMedicine::where('id',$request->req_process)->first();
        // dd($DonationProcess);
        $donMedication=MedicationRequest::where('request_id','=',$requestProcess->id)->with('medicine')->get();
    //   dd($donMedication);
      for ($j=0; $j < count($donMedication); $j++) { 
          # code...
          for ($i=0; $i < count($donMedication[$j]->medicine); $i++) { 
            # code...
            $medici=Medicine::where('id',$donMedication[$j]->medicine[$i]->id)->first();
            $medi=Medicine::where('id',$donMedication[$j]->medicine[$i]->id)

            ->update(['quantity' => ($medici->quantity-$donMedication[$j]->medicine[$i]->quantity)]);
        }
      }
     
     
        $req=new ReceivedRequest();
        $req->address=$request->address;
        $req->request_id=$request->req_process;
        $req->date=$request->date;
        $req->save();
        if($req){
            return redirect()->back()->with('message', 'request process Received  Successfly!');

        }

    }
    
        // 
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
