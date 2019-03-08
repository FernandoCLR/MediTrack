<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = $user_id=auth()->user()->id;
        $mas = Channel::all()->where('user_id',$userid); 
        return view('hospital.indexh')->with('mas',$mas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hospital.createh');
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
            'd_name' => 'required',
            'area' => 'required',
            'hospital' => 'required',
            'date' => 'required', 
            'time' => 'required'
        ]);

        //creating new timline record
        $post = new Channel;
        $post -> d_name = $request->input('d_name');
        $post -> hospital = $request->input('hospital');
        $post -> area = $request->input('area');
        $post -> date = $request->input('date');
        $post -> time = $request->input('time');
        $post -> user_id = auth()->user()->id;
        $post -> save();


       
        return redirect('/hospital')->with('success','Timeline Event Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editit = Channel::find($id);
        return view('hospital.edith')->with('editit',$editit); 
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
            'd_name' => 'required',
            'area' => 'required',
            'hospital' => 'required',
            'date' => 'required', 
            'time' => 'required'
        ]);

        // update timeline record 
        $post = Channel::find($id);
        $post -> d_name = $request->input('d_name');
        $post -> hospital = $request->input('hospital');
        $post -> area = $request->input('area');
        $post -> date = $request->input('date');
        $post -> time = $request->input('time');
        $post -> save();

        return redirect('/hospital')->with('success','Channel Successfully Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Channel::find($id);
        $post -> delete();
        return redirect('/hospital')->with('success','Channel Successfully Deleted');
    }
}
