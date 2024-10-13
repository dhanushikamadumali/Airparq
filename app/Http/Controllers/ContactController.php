<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Support\Facades\Crypt;
use Exception;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactlists = Contact::all();
        return view('contact.index',compact('contactlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        try{
            Contact::create($request->all());
            notify()->success('Successfully insert Contact!','Success!',[
                'position' => 'bottom-right'
            ]);
        }catch(Exception $e){
            notify()->error('Failed to insert contact.', 'Error', [
                'position' => 'top-right' // Change this to your desired position
            ]);

        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact,$id)
    {
        try{
            $deletecontact = $contact::FindOrFail(Crypt::decryptString($id));
            $deletecontact->delete();
            return response()->json([
                'success' =>true,
                'message' =>'contact deleted succssfully'
            ]);
        }catch(Exception $e){
            return response()->json([
                'success' =>false,
                'message' =>'failed contact deleted succssfully'
            ],500);
        }
    }
}
