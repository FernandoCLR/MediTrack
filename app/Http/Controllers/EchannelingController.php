<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\EChannel;
use App\User;

class EchannelingController extends Controller
{
    
    function index()
    {
     $hospital_list = DB::table('channels')
         ->groupBy('hospital')
         ->get();
     return view('echannel.create')->with('hospital_list', $hospital_list);
    }

    function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table('channels')
       ->where($select, $value)
       ->groupBy($dependent)
       ->get();
     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
     }
     echo $output;
    }

    public function store(Request $request)
    {
        $this -> validate ($request,[
            'area' => 'required',
            'd_name' => 'required',
            'hospital' => 'required',
            'date' => 'required', 
            'time' => 'required'
        ]);

        //creating new timline record
        $post = new EChannel;
        $post -> area = $request->input('area');
        $post -> d_name = $request->input('d_name');
        $post -> hospital= $request->input('hospital');
        $post -> date = $request->input('date');
        $post -> time = $request->input('time');
        $post -> user_id = auth()->user()->id;
        $post -> save();


       
        return redirect('/echannel')->with('success','Timeline Event Added');
       

    }

    public function show($id)
    {   
        $user_id=auth()->user()->id;
        $echannel = EChannel::all()->where('user_id',$user_id); 
        return view('echannel.show')->with('echannel',$echannel);
       
    }

    public function destroy($id)
    {
        
        $help=EChannel::find($id);
        $help -> delete();
        return redirect('/echannel/show')->with('success','E channel Deleted');
    
    }
    public function payments($id)
    {
        $payment=Echannel::find($id);
        return view('echannel.payments')->with('payment',$payment);
    
    }

    public function updateTwo(Request $request, $id)
    {
        $this -> validate ($request,[
            'd_amount' => 'required',
            'h_amount' => 'required',
            't_amount' => 'required',
            'e_date' => 'required'
           
        ]);

    
        
        //creating new timline record
        $post = Echannel::find($id);
        $post -> d_amount = $request->input('d_amount');
        $post -> h_amount = $request->input('h_amount');
        $post -> t_amount = $request->input('t_amount');
        $post -> e_date = $request->input('e_date');
        $post -> save();

        return redirect('/echannel/show')->with('success','Payment Done');;
       
    }

}
