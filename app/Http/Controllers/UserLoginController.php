<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    
    //Login Page
    public  function userLogin(){

        return view('.user_login');
    }

    //For Login User
    public function userLoginData(Request $request){

        // dd($request->all());

        // Define validation rules
        try{
            $rules = [
                'email' => 'required|email',
                'password' => [
                    'required',
                    'string',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/'
                ],
            ];

            // Validate the request data
            $validator = Validator::make($request->all(), $rules);

            // Check if validation fails
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            DB::beginTransaction();

                $loginUser = User::where('email', $request->email)->first();

                
            DB::commit();
            // dd($loginUser);
            if (Hash::check($request->password, $loginUser->password)) {
                if($loginUser && Auth::guard('web')->attempt(['email' => $request->email,'password'=> $request->password])){
                    Auth::guard('web')->user();
                    return response()->json(['success' => true, 'message' => 'Login successfully']);
                }else{
                    return response()->json(['success' => false, 'message' => 'User Not Exist !.. Register First']);
                }
            }else{
                return response()->json(['success' => false,'message' => 'Invalid credentials.']);
            }
            
            
        }
        catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'An error occurred while saving the data']);
        }

        
    }

    //for logout user
    public function Logout(){
        {
            try{
                Auth::logout();
                return response()->json(['success' => true, 'message' => 'Logout successfully']);
            }
            catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['success' => false, 'message' => 'An error occurred while saving the data']);
            }
        }
    }
}
