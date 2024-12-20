<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use FFI\Exception;
use Illuminate\Support\Facades\Redirect;
use App\Http\Middleware\CompanySettings;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware(CompanySettings::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreSettingRequest $request)
    {
        try{
            if($request['image']){
                $file = $request['image'];
                $imageName = time().'.'.$file->extension();
                $file->move(public_path('assets/img'),$imageName);
                $requestdata = $request->all();
                $requestdata['image'] = $imageName;
            }
            Setting::create($requestdata);
            notify()->success('Successfully Insert Setting!','Success!');
            return redirect()->back();

        }catch(Exception $e){
            notify()->error('Failed to insert Setting.', 'Error');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        $csetting1 = Setting::find(1);
        if(!$csetting1){
            return view('setting.create');
        }else{
            return view('setting.edit',compact('csetting1'));
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        try{
            $setting = $setting::findOrFail($request->id);
            $requestdata = $request->all();
            if($request['image']){
                $file= $request['image'];
                $imageName = time().'.'.$file->extension();
                $file->move(public_path('assets/img'),   $imageName);
                $requestdata['image'] =    $imageName;
            }else{
                $requestdata['image'] =  $setting->image;
            }
            $setting->update($requestdata);
            notify()->success('Sucessfully Updated Setting!');
            return redirect()->back();
        }catch(Exception $e){
            notify()->error('Failed to Update Setting');
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
