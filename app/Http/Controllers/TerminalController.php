<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use App\Http\Requests\StoreTerminalRequest;
use App\Http\Requests\UpdateTerminalRequest;
use FFI\Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;

class TerminalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $terminallists = Terminal::all();
        return view('terminal.index',compact('terminallists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('terminal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTerminalRequest $request)
    {
        try{
            if($request['image']){
                $file = $request['image'];
                $imageName = time().'.'.$file->extension();
                $file->move(public_path('images'), $imageName);
                $requestdata = $request->all();

                $requestdata['image'] = $imageName;
            }
            Terminal::create($requestdata);
            notify()->success('Successfully registered terminal!','Success!',[
                'position' => 'bottom-right'
            ]);
        }catch(Exception $e){
            notify()->error('Failed to insert terminal.', 'Error', [
                'position' => 'top-right' // Change this to your desired position
            ]);
        }
         return Redirect::route('allterminal');
    }

    /**
     * Display the specified resource.
     */
    public function show(Terminal $terminal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Terminal $terminal,$id)
    {
        $terminal = $terminal::Find(Crypt::decryptString($id));
        return view('terminal.edit',compact('terminal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTerminalRequest $request, Terminal $terminal)
    {
     
        try{
            // $data = $request->all();
            $terminal = $terminal::findOrFail($request->id);
            $requestdata = $request->all();
            if($request['image']){
                $file= $request['image'];
                $imageName = time().'.'.$file->extension();
                $file->move(public_path('images'),   $imageName);


                $requestdata['image'] =    $imageName;
            }else{
                $requestdata['image'] = $terminal->image;
            }
            $terminal->update($requestdata);
            notify()->success('Sucessfully Updated terminal!');
        }catch(Exception $e){
            notify()->error('Failed to Update terminal');
        }
        return Redirect::route('allterminal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Terminal $terminal,$id)
    {
        try{
            $deleteterminal = $terminal::FindOrFail(Crypt::decryptString($id));
            $deleteterminal->delete();
            return response()->json([
                'success' =>true,
                'message' =>'terminal deleted succssfully'
            ]);

        }catch(Exception $e){
            return response()->json([
                'success' =>false,
                'message' =>'failed terminal deleted succssfully'
            ],500);

        }
    }
}
