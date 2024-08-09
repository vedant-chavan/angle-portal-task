<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserDataController extends Controller
{

    //for user data list
    public function userData(){

        $useData['data'] = User::all();
        // dd($useData);
        return view('user_data',$useData);
    }

    //for edit user data
    public function editUserData(Request $request){

        // Define validation rules
        try {
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone_number' => 'required',
                'gender' => 'required',
                'employee_type' => 'required',
            ];

            // Validate the request data
            $validator = Validator::make($request->all(), $rules);
            // Check if validation fails
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            DB::beginTransaction();

                // Check if the user already exists
                $existingUser = User::where('email', $request->enail)->first();
                    
                if ($existingUser ) {
                    return response()->json(['status' => 403,'success' => false, 'message' => 'Email Already Exist']);
                }

                // Find the user
                $user = User::findOrFail($request->input('user_id'));
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'gender' => $request->gender,
                    'employee_type' => $request->employee_type,
                ]);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data Updated successfully']);
        }
        catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'An error occurred while saving the data']);
        }
    }


    //for delete user data
    public function deleteUser(Request $request){

        try{
            $userId = $request->input('user_id');

            // dd($userId);
            User::where('id',$userId)->delete();
            return response()->json(['success' => true,'message'=>'User Deleted successfully']);
        }
        catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'An error occurred while saving the data']);
        }
    }
}
