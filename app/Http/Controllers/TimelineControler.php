<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timeline;
use App\User;
use Illuminate\Support\Facades\Storage;





class TimelineControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user_id=auth()->user()->id;
        $timeline=Timeline::orderBy('created_at','desc')->where('user_id',$user_id)->paginate(10);
        return view('timeline.timeline')->with('timeline',$timeline);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('timeline.create');

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
        $post -> user_id = auth()->user()->id;
        $post -> file_title = $request->input('file_title');
        $post -> file_name = $fileNameToStore;
        $post -> save();


       
        return redirect('/timeline')->with('success','Timeline Event Added');
       

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $timeline = Timeline::find($id); 
        return view('timeline.show')->with('timeline',$timeline);
        
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timeline = Timeline::find($id);
        return view('timeline.edit')->with('timeline',$timeline); 
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

        return redirect('/timeline')->with('success','Timeline Event Updated');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Timeline::find($id);
        $post -> delete();
        return redirect('/timeline')->with('success','Timeline Event Deleted');
    }

    
    

}
