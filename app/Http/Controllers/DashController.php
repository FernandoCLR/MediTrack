<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dash;
use App\User;


class DashController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $user_id=auth()->user()->id;
        $dashes=Dash::all()->where('user_id',$user_id);
        return view('dash.home')->with('dashes',$dashes);

      
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('dash.createdash');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate ($request,[
            'first_name' => 'required',
            'second_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required', 
            'm_tp_no' => 'required', 
            'b_grp' => 'required', 
            'emg_one' => 'required', 
            'emg_two' => 'required',
            'address' => 'required',
            'nic' => 'required'
      
        ]);
        $post = new Dash;
        $post -> first_name = $request->input('first_name');
        $post -> second_name = $request->input('second_name');
        $post -> last_name = $request->input('last_name');
        $post -> dob = $request->input('dob');
        $post -> age = $request->input('age');
        $post -> m_tp_no = $request->input('m_tp_no');
        $post -> h_tp_no = $request->input('h_tp_no');
        $post -> email = $request->input('email');
        $post -> emg_one_name = $request->input('emg_one_name');
        $post -> emg_one_relationto_user = $request->input('emg_one_relationto_user');
        $post -> emg_two_relationto_user = $request->input('emg_two_relationto_user');
        $post -> emg_two_name = $request->input('emg_two_name');
        $post -> emg_one = $request->input('emg_one');
        $post -> emg_two = $request->input('emg_two');
        $post -> description = $request->input('description');
        $post -> address = $request->input('address');
        $post -> nic = $request->input('nic');
        $post -> gender = $request->input('gender');
        $post -> b_grp = $request->input('b_grp');
        $post -> user_id = auth()->user()->id;
        $post -> save();

        return redirect('/home')->with('success','Information Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $dashes = Dash::find($user_id); 
        return view('dash.home')->with('dashes',$dashes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dashes = Dash::find($id);
        return view('dash.editinfo')->with('dashes',$dashes); 
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
        $this -> validate ($request,[
            'first_name' => 'required',
            'second_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required', 
            'm_tp_no' => 'required', 
            'b_grp' => 'required', 
            'emg_one' => 'required', 
            'emg_two' => 'required',
            'address' => 'required',
            'nic' => 'required'
      
        ]);
        $post = Dash::find($id);
        $post -> first_name = $request->input('first_name');
        $post -> second_name = $request->input('second_name');
        $post -> last_name = $request->input('last_name');
        $post -> dob = $request->input('dob');
        $post -> age = $request->input('age');
        $post -> m_tp_no = $request->input('m_tp_no');
        $post -> h_tp_no = $request->input('h_tp_no');
        $post -> email = $request->input('email');
        $post -> emg_one_name = $request->input('emg_one_name');
        $post -> emg_one_relationto_user = $request->input('emg_one_relationto_user');
        $post -> emg_two_relationto_user = $request->input('emg_two_relationto_user');
        $post -> emg_two_name = $request->input('emg_two_name');
        $post -> emg_one = $request->input('emg_one');
        $post -> emg_two = $request->input('emg_two');
        $post -> description = $request->input('description');
        $post -> address = $request->input('address');
        $post -> nic = $request->input('nic');
        $post -> gender = $request->input('gender');
        $post -> b_grp = $request->input('b_grp');
        
        $post -> save();

        return redirect('/home')->with('success','Information Added');
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
