<?php

namespace App\Http\Controllers;

use App\Models\Promocode;
use App\Http\Requests\StorePromocodeRequest;
use App\Http\Requests\UpdatePromocodeRequest;
use Illuminate\Support\Facades\Crypt;
use Exception;
use Illuminate\Support\Facades\Redirect;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promocodelist = Promocode::all();
        return view('promocode.index',compact('promocodelist'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('promocode.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePromocodeRequest $request)
    {
        try{
            Promocode::create($request->all());
            notify()->success('Successfully registered promocode!','Success!',[
                'position' => 'bottom-right'
            ]);
        }catch(Exception $e){
            notify()->error('Failed to insert promocode.', 'Error', [
                'position' => 'top-right' // Change this to your desired position
            ]);

        }
         return Redirect::route('allpromolist');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promocode $promocode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promocode $promocode,$id)
    {
        $promocode = $promocode::find(Crypt::decryptString($id));
        return view('promocode.edit', compact('promocode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromocodeRequest $request, Promocode $promocode)
    {
        try{
            $data = $request->all();
            $promocode = $promocode::findOrFail($request->id);
            $promocode->update($data);
            notify()->success('Sucessfully Updated promocode!');
        }catch(Exception $e){
            notify()->error('Failed to Update promocode.');
        }
        return Redirect::route('allpromolist');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promocode $promocode,$id)
    {
        try{
            $deletepromocode = $promocode::FindOrFail(Crypt::decryptString($id));
            $deletepromocode->delete();
            return response()->json([
                'success' =>true,
                'message' =>'promocode deleted succssfully'
            ]);
        }catch(Exception $e){
            return response()->json([
                'success' =>false,
                'message' =>'failed promocode deleted succssfully'
            ],500);
        }
    }
}
