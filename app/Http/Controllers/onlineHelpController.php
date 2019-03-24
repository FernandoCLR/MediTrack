<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Onlinehelp;

class onlineHelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $help=OnlineHelp::orderBy('created_at','desc')->paginate(10);
        return view('onlinehelp.help')->with('help',$help);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('onlinehelp.create');
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
            'question' => 'required'
            
        ]);
        $post = new OnlineHelp;
        $post -> title = $request->input('title');
        $post -> question = $request->input('question');
        $post -> answer = $request->input('answer');
        $post -> user_id = auth()->user()->id;
        $post -> save();

        return redirect('/onlinehelp')->with('success','Your question have been asked.');
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
        $help = OnlineHelp::find($id);
        return view('onlinehelp.edit')->with('help',$help); 
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
            'question' => 'required'
            
        ]);
        $post = OnlineHelp::find($id);
        $post -> title = $request->input('title');
        $post -> question = $request->input('question');
        $post -> answer = $request->input('answer');
        
        $post -> save();

        return redirect('/onlinehelp')->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $help=OnlineHelp::find($id);
        $help -> delete();
        return redirect('/onlinehelp')->with('success','Question Deleted');
    
    }
}
