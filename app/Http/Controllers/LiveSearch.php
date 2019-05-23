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
     if(auth()->user()->access==null){
        $user_id=auth()->user()->id;
        $dashes=Dash::all()->where('user_id',$user_id);
        return view('dash.home')->with('dashes',$dashes); 
     }else{
        return view('livesearch.live_search');
     }
    }

    function action(Request $request)
    {
        $this -> validate ($request,[
            'nic' => 'required',
            
        ]);
        $nic=$request->get('nic');
        $result=Dash::all()->where('nic',$nic);
        return view('livesearch.searchre')->with('result',$result);
    }

    public function show($id){
      $users= Dash::all()->where('user_id',$id);
    //   dd($user);
      return view('livesearch.show')->with('users',$users);
     
  }
      public function showtwo($id){
     
        $timeline = Timeline::orderBy('created_at','desc')->where('user_id',$id)->paginate(10); 
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
            'status' => 'required',
            'file_name'=> 'nullable|max:1999'
        ]);
        if($request->hasFile('file_name')){
            $filenameWithExt = $request->file('file_name')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            $extension = $request->file('file_name')->getClientOriginalExtension();
        
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
        
            $path = $request->file('file_name')->storeAs('public/file',$fileNameToStore);
        }

        //creating new timline record
        $post = Timeline::find($id);
        $post -> title = $request->input('title');
        $post -> hospital = $request->input('hospital');
        $post -> body = $request->input('body');
        $post -> treatment = $request->input('treatment');
        $post -> status = $request->input('status');
        $post -> file_title = $request->input('file_title');
        if($request->hasFile('file_name')){
        $post -> file_name = $fileNameToStore;
        }
        $post -> save();

        return redirect('/live_search/history/'.$id)->with('success','Timeline Event Updated');

    }

    public function create($id)
    {
        
        $timeline = User::find($id);
        // dd($timeline);
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
            'status' => 'required',
            'file_name'=> 'nullable|max:1999'
        ]);

        if($request->hasFile('file_name')){
            $filenameWithExt = $request->file('file_name')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            $extension = $request->file('file_name')->getClientOriginalExtension();
        
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
        
            $path = $request->file('file_name')->storeAs('public/file',$fileNameToStore);
        }else{
            $fileNameToStore = 'No.pdf';
        }

        //creating new timline record
        $post = new Timeline;
        $post -> title = $request->input('title');
        $post -> hospital = $request->input('hospital');
        $post -> body = $request->input('body');
        $post -> treatment = $request->input('treatment');
        $post -> status = $request->input('status');
        $post -> file_title = $request->input('file_title');
        $post -> file_name = $fileNameToStore;
        $post -> user_id = $id;
        $post -> save();


       
        return redirect('/live_search/history/'.$id)->with('success','Timeline Event Added');
       

    }
    public function destroy($id)
    {
        $post = Timeline::find($id);
        $post -> delete();
        return redirect('/live_search')->with('success','Timeline Event Deleted');
    }
}
