<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Volunteer;
use App\Models\benifactor;
use App\Models\Patient;
use Auth;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function loginusers(Request $request)
    {
        // dd($request->type);
        if($request->type=="benifactor"){
            $validatedData = $request->validate([
               
                'username' => 'required',
                'password'=>'required|min:6',
               
            ]);
            $benifactor = benifactor::where('username', '=',$request->username)->first();
         if($benifactor){
            if(Hash::check($request->password, $benifactor->password)){
                // Auth::login($benifactor);
        Auth::guard('benifactor')->login($benifactor);

                return redirect('donation_process');
              }
              else{
                return redirect()->back()->with('message', 'password is not correct');
              }
         }
         else{
            return redirect()->back()->with('message', 'user name Not exist');
         }
           
    }
    elseif($request->type=="patient"){
        $validatedData = $request->validate([
           
            'username' => 'required',
            'password'=>'required|min:6',
           
        ]);
        $patient = Patient::where('username', '=',$request->username)->first();
        // dd($patient);
     if($patient){
        if(Hash::check($request->password, $patient->password)){
            // Auth::login($patient);
            // Auth::guard('patient')::login($patient);
            Auth::guard('patient')->login($patient);
            return redirect('request_process');
          }
          else{
            return redirect()->back()->with('message', 'password is not correct');
          }
     }
     else{
        return redirect()->back()->with('message', 'user name Not exist');
     }
       
}
elseif($request->type=="volunteer"){
    $validatedData = $request->validate([
       
        'username' => 'required',
        'password'=>'required|min:6',
       
    ]);
    $volunteer = Volunteer::where('username', '=',$request->username)->first();
 if($volunteer){
    if(Hash::check($request->password, $volunteer->password)){
        // Auth::login($volunteer);
        Auth::guard('volunteer')->login($volunteer);
        return redirect('volunteer');
      }
      else{
        return redirect()->back()->with('message', 'password is not correct');
      }
 }
 else{
    return redirect()->back()->with('message', 'user name Not exist');
 }
   
}
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
        if($request->type=="benifactor"){
            $validatedData = $request->validate([
                'type' => 'required',
                'name' => 'required',
                'username' => 'required|unique:benifactors',
                'address' => 'required',
                'phonenumber'=>'required|unique:benifactors',
                'password'=>'required|min:6',
                're_password'=>'required_with:password|same:password|min:6',
            ]);
            $benifactor=new benifactor();
            $benifactor->name=$request['name'];
            $benifactor->username=$request['username'];
            $benifactor->address=$request['address'];
            $benifactor->phonenumber=$request['phonenumber'];
            $benifactor->password=Hash::make($request['password']);

            $benifactor->save();
            // Auth::login($benifactor);
            Auth::guard('benifactor')->login($benifactor);
            return redirect('donation_process');
          
        }
        if($request->type=="patient"){
            $validatedData = $request->validate([
                'type' => 'required',
                'name' => 'required',
                'username' => 'required|unique:patients',
                'address' => 'required',
                'phonenumber'=>'required|unique:patients',
                'password'=>'required|min:6',
                're_password'=>'required_with:password|same:password|min:6',
            ]);
            $patient=new Patient();
            $patient->name=$request['name'];
            $patient->username=$request['username'];
            $patient->address=$request['address'];
            $patient->phonenumber=$request['phonenumber'];
            $patient->password=Hash::make($request['password']);
            $patient->active=1;
            $patient->save();
            Auth::guard('patient')->login($patient);
            return redirect('request_process');
          
        }
        elseif($request->type=="volunteer"){
            $validatedData = $request->validate([
                'type' => 'required',
                'name' => 'required',
                'username' => 'required|unique:volunteers',
                'phonenumber'=>'required|unique:volunteers',
                'password'=>'required|min:6',
                're_password'=>'required_with:password|same:password|min:6',
                'birthdate'=>'required',
                
            ]);
            $volunteer=new Volunteer();
            $volunteer->name=$request['name'];
            $volunteer->username=$request['username'];
            $volunteer->birthdate=$request['birthdate'];
            $volunteer->phonenumber=$request['phonenumber'];
            $volunteer->password=Hash::make($request['password']);

            $volunteer->save();
            Auth::guard('volunteer')->login($volunteer);
            return redirect('volunteer');
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
    public function about()
    {
        return view('about');
    }
    public function edit()
    {
        //
        if( $current_user= auth()->guard('patient')->user()){
            return view('edit',compact('current_user'));
        }
        elseif( $current_user= auth()->guard('benifactor')->user()){
            return view('edit',compact('current_user'));
        }
        elseif($current_user= auth()->guard('volunteer')->user()){
            return view('edit',compact('current_user'));
        }

        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
       
        if( $current_user= auth()->guard('patient')->user()){
            $user=Patient::where('id',$current_user->id)->first();
            if(!$request->password){
                $validatedData = $request->validate([
                  
                    'name' => 'required',
                    'username' => 'required|unique:patients,username,'.$user->id,
                    'address' => 'required',
                    'phonenumber'=>'required|unique:patients,phonenumber,'.$user->id
                   
                ]);
                $pa=Patient::where('id',$current_user->id)

                ->update(['name' => $request->name,
                'username' => $request->username,
                'address'=>$request->address,
                'phonenumber'=>$request->phonenumber,
                'password'=>$user->password

                ]);
            }
            else{
                $validatedData = $request->validate([
                 
                    'name' => 'required',
                    'username' => 'required|unique:patients,username,'.$user->id,
                    'address' => 'required',
                    'phonenumber'=>'required|unique:patients,phonenumber,'.$user->id,
                    'password'=>'required|min:6',
                    're_password'=>'required_with:password|same:password|min:6',
                ]);
                $pa=Patient::where('id',$current_user->id)

                ->update(['name' => $request->name,
                'username' => $request->username,
                'address'=>$request->address,
                'phonenumber'=>$request->phonenumber,
                'password'=>$request->password

                ]);
            }
            return redirect('request_process');
          
        }

               
        if( $current_user= auth()->guard('volunteer')->user()){
            $user=Volunteer::where('id',$current_user->id)->first();
            if(!$request->password){
                $validatedData = $request->validate([
                   
                    'name' => 'required',
                    'username' => 'required|unique:volunteers,username,' . $user->id,
                    'phonenumber'=>'required|unique:volunteers,phonenumber,' . $user->id,
                   
                    'birthdate'=>'required',
                    
                ]);
                $pa=Volunteer::where('id',$current_user->id)

                ->update(['name' => $request->name,
                'username' => $request->username,
                'birthdate'=>$request->birthdate,
                'phonenumber'=>$request->phonenumber,
                'password'=>$user->password

                ]);
            }
            else{
                $validatedData = $request->validate([
                 
                    'name' => 'required',
                    'username' => 'required|unique:volunteers,username,' . $user->id,
                    'phonenumber'=>'required|unique:volunteers,phonenumber,' . $user->id,
                    'password'=>'required|min:6',
                    're_password'=>'required_with:password|same:password|min:6',
                    'birthdate'=>'required',
                    
                ]);
                $pa=Volunteer::where('id',$current_user->id)

                ->update(['name' => $request->name,
                'username' => $request->username,
                'birthdate'=>$request->birthdate,
                'phonenumber'=>$request->phonenumber,
                'password'=>$request->password

                ]);
            }
            return redirect('volunteer');
          
        }

               
        if( $current_user= auth()->guard('benifactor')->user()){
            $user=benifactor::where('id',$current_user->id)->first();
            if(!$request->password){
                $validatedData = $request->validate([
                   
                    'name' => 'required',
                    'username' => 'required|unique:benifactors,username,'.$user->id,
                    'address' => 'required',
                    'phonenumber'=>'required|unique:benifactors,phonenumber,'.$user->id,
                   
                ]);
                $pa=benifactor::where('id',$current_user->id)

                ->update(['name' => $request->name,
                'username' => $request->username,
                'address'=>$request->address,
                'phonenumber'=>$request->phonenumber,
                'password'=>$user->password

                ]);
            }
            else{
                $validatedData = $request->validate([
                
                    'name' => 'required',
                    'username' => 'required|unique:benifactors,username,'.$user->id,
                    'address' => 'required',
                    'phonenumber'=>'required|unique:benifactors,phonenumber,'.$user->id,
                    'password'=>'required|min:6',
                    're_password'=>'required_with:password|same:password|min:6',
                ]);
                $pa=benifactor::where('id',$current_user->id)

                ->update(['name' => $request->name,
                'username' => $request->username,
                'address'=>$request->address,
                'phonenumber'=>$request->phonenumber,
                'password'=>$request->password

                ]);
            }
            return redirect('donation_process');
          
        }

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
    public function logout(Request $request) {
        Auth::logout();
        Auth::guard('volunteer')->logout();
        Auth::guard('patient')->logout();
        Auth::guard('benifactor')->logout();
        return redirect('/login');
      }
}
