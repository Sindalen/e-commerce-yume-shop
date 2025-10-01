<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Province;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'identifier' => 'required|string',
            'password' => 'required|string',
        ]);

        // Determine if identifier is email or phone
        $identifier = $request->identifier;
        $isEmail = filter_var($identifier, FILTER_VALIDATE_EMAIL);
        $isPhone = is_numeric($identifier);

        if (!$isEmail && !$isPhone) {
            throw ValidationException::withMessages([
                'identifier' => ['Please provide a valid email or phone number'],
            ]);
        }

        // Attempt authentication
        $credentials = [
            $isEmail ? 'email' : 'phone_number' => $identifier,
            'password' => $request->password,
        ];

        if (!Auth::guard('customer')->attempt($credentials, $request->remember)) {
            throw ValidationException::withMessages([
                'identifier' => ['The provided credentials do not match our records'],
            ]);
        }

        $request->session()->regenerate();
        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function register()
    {
        $genders = Gender::all();
        $provinces = Province::all();
        
        return view('auth.register', compact('genders', 'provinces'));
    }

    public function registerPost(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'gender' => 'required|string|exists:genders,name',
            'identifier' => 'required|string',
            'password' => 'required|string|min:8',
            'province' => 'required|string|exists:provinces,name',
            'address' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Check if identifier is email or phone
        $identifier = $request->identifier;
        $isEmail = filter_var($identifier, FILTER_VALIDATE_EMAIL);
        $isPhone = is_numeric($identifier);

        if ($isEmail && $isPhone) {
            return redirect()->back()
                ->with('error', 'Please provide either email or phone number, not both')
                ->withInput();
        }

        if (!$isEmail && !$isPhone) {
            return redirect()->back()
                ->with('error', 'Please provide a valid email or phone number')
                ->withInput();
        }

        // Check uniqueness
        if ($isEmail && Customer::where('email', $identifier)->exists()) {
            return redirect()->back()
                ->with('error', 'Email is already taken')
                ->withInput();
        }

        if ($isPhone && Customer::where('phone_number', $identifier)->exists()) {
            return redirect()->back()
                ->with('error', 'Phone number is already taken')
                ->withInput();
        }

        // Get IDs for relations
        $provinceId = Province::where('name', $request->province)->value('id');
        $genderId = Gender::where('name', $request->gender)->value('id');

        if (!$provinceId || !$genderId) {
            return redirect()->back()
                ->with('error', 'Invalid province or gender selected')
                ->withInput();
        }

        // Create customer
        $customer = Customer::create([
            'username' => $request->username,
            'address' => $request->address,
            'email' => $isEmail ? $identifier : null,
            'phone_number' => $isPhone ? $identifier : null,
            'password' => Hash::make($request->password),
            'province_id' => $provinceId,
            'gender_id' => $genderId,
            // 'created_by' => auth()->id(),
            // 'updated_by' => auth()->id(),
        ]);

        return redirect()->route('login')
            ->with('success', 'Registration successful! Please login.');
    }
}