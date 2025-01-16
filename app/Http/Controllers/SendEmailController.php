<?php

namespace App\Http\Controllers;

use App\Models\SendEmail;
use App\Http\Requests\StoreSendEmailRequest;
use App\Http\Requests\UpdateSendEmailRequest;
use Exception;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Middleware\CompanySettings;
class SendEmailController extends Controller
{
    public function __construct(){
        $this->middleware(CompanySettings::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emaillists = SendEmail::all();
        return view('report.allemail',compact('emaillists'));
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
    public function store(StoreSendEmailRequest $request)
    {

        try{
            SendEmail::create($request->all());
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
    public function show(SendEmail $sendEmail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SendEmail $sendEmail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSendEmailRequest $request, SendEmail $sendEmail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SendEmail $sendEmail)
    {
        //
    }
    public function getpdf()
    {
        $emaillists = SendEmail::all();
        $data = [
            'emails' => $emaillists,
        ];
        $pdf = PDF::loadView('report.allemailpdf', $data);
        return $pdf->download('allemaillists.pdf');
    }
}
