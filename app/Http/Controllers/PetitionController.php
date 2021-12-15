<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\PetitionCreated;
use App\Mail\MailerAuth;
use Illuminate\Support\Facades\Mail;
class PetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Petition::where('state', 'PUBLISHED')->paginate(10);
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
        $request->validate([
            'subject' => 'required',
            'description' => 'required',
        ]);

        $user = Auth::user();

        $petition = new Petition([
            "subject" => $request->get('subject'),
            "description" => $request->get('description'),
        ]);
        
        $petition->user()->associate($user);

        $petition->save();

        Mail::to($user['email'])->send(new PetitionCreated($request));

        return $petition;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petition  $petition
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Petition::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petition  $petition
     * @return \Illuminate\Http\Response
     */
    public function edit(Petition $petition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petition  $petition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $petition = Petition::find($id);
        $petition->update($request->all());
        return $petition;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petition  $petition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petition = Petition::find($id);
        return  $petition->delete();    
    }
}
