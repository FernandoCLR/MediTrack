<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Dash;
use App\EChannel;
use App\Timeline;
use App\User;

class LiveSearch extends Controller
{
    function index()
    {
     return view('livesearch.live_search');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('dashes')
         ->where('first_name', 'like', '%'.$query.'%')
         ->orWhere('second_name', 'like', '%'.$query.'%')
         ->orWhere('last_name', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%')
         ->orWhere('address', 'like', '%'.$query.'%')
         ->orWhere('nic', 'like', '%'.$query.'%')
         ->orWhere('b_grp', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('dashes')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr >
         <td>'.$row->first_name.'</td>
         <td>'.$row->second_name.'</td>
         <td>'.$row->last_name.'</td>
         <td>'.$row->address.'</td>
         <td>'.$row->email.'</td>
         <td>'.$row->nic.'</td>
         <td>'.$row->b_grp.'</td>
         <td>'.$row->m_tp_no.'</td>
         <td><a href="/live_search/'.$row->user_id.'">View More..</a></td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

    public function show($id){
      $user= Dash::find($id);
      return view('livesearch.show')->with('user',$user);
     
  }
      public function showtwo($id){
        $timeline = Timeline::all()->where('user_id',$id); 
        // dd($timeline);
        return view('livesearch.showtwo')->with('timeline',$timeline);
      
    }

    public function details($id)
    {   
        $timeline = Timeline::find($id); 
        return view('livesearch.details')->with('timeline',$timeline);
       
    }

    public function edit($id)
    {
        $timeline = Timeline::find($id);
        return view('livesearch.edit')->with('timeline',$timeline); 
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
            'title' => 'required',
            'hospital' => 'required',
            'body' => 'required',
            'treatment' => 'required',
            'status' => 'required'
        ]);

        //creating new timline record
        $post = Timeline::find($id);
        $post -> title = $request->input('title');
        $post -> hospital = $request->input('hospital');
        $post -> body = $request->input('body');
        $post -> treatment = $request->input('treatment');
        $post -> status = $request->input('status');
        $post -> save();

        return redirect('/live_search')->with('success','Timeline Event Updated');

    }

    public function create($id)
    {
        
        $timeline = Timeline::find($id);
        return view('livesearch.create')->with('timeline',$timeline); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $this -> validate ($request,[
            'title' => 'required',
            'hospital' => 'required',
            'body' => 'required',
            'treatment' => 'required', 
            'status' => 'required'
        ]);

        //creating new timline record
        $post = new Timeline;
        $post -> title = $request->input('title');
        $post -> hospital = $request->input('hospital');
        $post -> body = $request->input('body');
        $post -> treatment = $request->input('treatment');
        $post -> status = $request->input('status');
        $post -> user_id = $id;
        $post -> save();


       
        return redirect('/live_search')->with('success','Timeline Event Added');
       

    }
}
