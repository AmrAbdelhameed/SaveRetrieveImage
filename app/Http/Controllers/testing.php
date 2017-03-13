<?php

namespace App\Http\Controllers;

use App\file;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class testing extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("file");
    }

    public function showall()
    {
        $user = file::all();
        return view('showall', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new file;

        $user->title = Input::get('name');

        $file = $request->file('image');
        $destinationPath = base_path() . '/';
        $file->move($destinationPath, $file->getClientOriginalName());

        $user->name = $file->getClientOriginalName();
        $user->size = $file->getClientsize();
        $user->type = $file->getClientMimeType();

        $user->save();
        return redirect("show");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = file::findorfail($id);
        return view('showbyid', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
