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

class UserRegistrationController extends Controller
{
    // Show registration form
    public function userRegistration()
    {
        return view('user_registration');
    }

    // Handle user registration
    public function registerUserData(Request $request)
    {
        // Define validation rules
        try {
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'password' => [
                    'required',
                    'string',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/'
                ],
                'confirm_password' => 'required|same:password',
                'phone_number' => 'required',
                'gender' => 'required',
                'employee_type' => 'required',
            ];

            // Define custom error messages
            $messages = [
                'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be between 8 and 20 characters long.',
                'confirm_password.same' => 'The confirmation password does not match.'
            ];

            // Validate the request data
            $validator = Validator::make($request->all(), $rules, $messages);

            // Check if validation fails
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            DB::beginTransaction();
            
            // Check if the user already exists, including soft deleted users
            $existingUser = User::withTrashed()->where('email', $request->email)->first();

            if ($existingUser) {
                if ($existingUser->trashed()) {
                    // Restore the soft deleted user
                    $existingUser->restore();
                    $existingUser->update([
                        'name' => $request->name,
                        'password' => Hash::make($request->password),
                        'gender' => $request->gender,
                        'phone_number' => $request->phone_number,
                        'employee_type' => $request->employee_type,
                    ]);
                } else {
                    // Active user already exists
                    return response()->json(['status' => 403, 'success' => false, 'message' => 'Email Already Exist']);
                }
            } else {
                // Create a new user
                $existingUser = User::create([
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'name' => $request->name,
                    'gender' => $request->gender,
                    'phone_number' => $request->phone_number,
                    'employee_type' => $request->employee_type,
                ]);
            }

            // Authenticate the user
            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
                Auth::guard('web')->user();
            }

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Form submitted successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'An error occurred while saving the data']);
        }
    }
}
