<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContact;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    // }

    // // la create non serve perche il form non c'è
    // public function create()
    // {
    //     //
    // }

    /**
     * Serve per il salvataggio dei dati
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => 'errore di validazione',
            ]);
        }

        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        Mail::to('francescocarrara298@gmail.com')->send(new NewContact($newLead));

        return response()->json([
            'success' => true,
            'lead' => $newLead,
        ]);
    }

    /**
     * Display the specified resource.
     */
    // public function show(Lead $lead)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Lead $lead)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Lead $lead)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Lead $lead)
    // {
    //     //
    // }
}
