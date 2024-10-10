<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userlists = User::all();
        // $superadminlists = User::getSuperAdmin();
        // $userlists = User::all();
        return view('user.index',compact('userlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
     {
         try {
            $validatedData = $request->all();
             // If validation is successful, create a new user with hashed password
             User::create([
                 'email' => $validatedData['email'],
                 'password' => Hash::make($validatedData['password']), // This is now hashed
                 'name' => $validatedData['name'],
                 'role' => $validatedData['role'],
             ]);

             notify()->success('Successfully Registered', 'Success!', [
                 'position' => 'bottom-right'
             ]);

             return Redirect::route('alluserlist');

         } catch (ValidationException $e) {
             // Custom handling for validation errors
             notify()->error('Validation Error: Please check your input.', 'Error', [
                 'position' => 'top-right'
             ]);

             // Optionally, you can log the validation errors for debugging
             Log::error('Validation failed: ', $e->errors());

             // Redirect back with validation errors
             return redirect()->back()->withErrors($e->errors())->withInput();
         } catch (Exception $e) {
             // Custom handling for other types of exceptions
             notify()->error('Failed To Insert UserList.', 'Error', [
                 'position' => 'top-right'
             ]);

             // Log the error for debugging
             Log::error('Error creating user: ' . $e->getMessage());

             return redirect()->back()->withInput();
         }
     }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user,$id)
    {
        $user = $user::find(Crypt::decryptString($id));
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try{
            $data = $request->all();
            $user = $user::findOrFail($request->id);
            $user->update($data);
            notify()->success('Update User Succeessfuly!');

        }catch(Exception $e){
            notify()->error('Failed to User Updated');
        }
        return Redirect::route('alluserlist');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user,$id)
    {
        try{
            $deleteuser = $user::findOrFail(Crypt::decryptString($id));
            $deleteuser->delete();
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
        return Redirect::route('alluserlist');
    }

    // public function logoutuser(Request $request)
    // {
    //     User::logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/admin/login'); // Custom redirect after logout
    // }


}
