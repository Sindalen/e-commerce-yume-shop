<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Gender;
use App\Models\Province;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Validation\Rule;
// use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function profile()
    {
        // Get authenticated customer with relationships
        $customer = auth()->guard('customer')->user();
        
        if (!$customer) {
            return redirect()->route('login')->with('error', 'Please login first');
        }

        // Load relationships
        $customer->load(['Gender', 'Province']);
        
        // Get all options for dropdowns
        $genders = Gender::all();
        $provinces = Province::all();

        return view('/components/profile/user-profile', compact('customer', 'genders', 'provinces'));
    }

    public function address()
    {
        // Get authenticated customer with relationships
        $customer = auth()->guard('customer')->user();
        
        if (!$customer) {
            return redirect()->route('login')->with('error', 'Please login first');
        }

        // Load relationships
        $customer->load(['Gender', 'Province']);
        
        // Get all options for dropdowns
        $genders = Gender::all();
        $provinces = Province::all();

        return view('/components/profile/address', compact('customer', 'genders', 'provinces'));
    }

    public function update_general(Request $request)
    {
        $customer = auth()->guard('customer')->user();
        
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'gender_id' => 'required|exists:genders,id',
            'province_id' => 'required|exists:provinces,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Validation failed');
        }

        try {
            $customer->update([
                'username' => $request->username,
                'gender_id' => $request->gender_id,
                'province_id' => $request->province_id,
            ]);
            
            return back()->with('success', 'Profile updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error updating profile');
        }
    }

    public function update_contact(Request $request)
    {
        $customer = auth()->guard('customer')->user();
        
        $validated = $request->validate([
            'email' => ['email',Rule::unique('customers')->ignore($customer->id)
            ],
            'phone_number' => 'string|max:20|regex:/^[0-9\-\+\s]+$/',
        ]);

        try {
            $customer->update($validated);
            
            return back()->with('success', 'Contact information updated successfully');
        } catch (\Exception $e) {
            Log::error('Contact update error: '.$e->getMessage());
            return back()
                ->withInput()
                ->with('error', 'Error updating contact information. Please try again.');
        }
    }

    public function update_password(Request $request)
    {
        $customer = auth()->guard('customer')->user();
        
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Password validation failed');
        }

        if (!Hash::check($request->current_password, $customer->password)) {
            return back()->with('error', 'Current password is incorrect');
        }

        try {
            $customer->update([
                'password' => Hash::make($request->new_password)
            ]);
            
            return back()->with('success', 'Password updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error updating password');
        }
    }

    public function update_address(Request $request)
    {
        $customer = auth()->guard('customer')->user();
        
        $validator = Validator::make($request->all(), [
            'address' => 'required|string|max:255', 
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Validation failed');
        }

        try {
            $customer->update([
                'address' => $request->address,
            ]);
            
            return back()->with('success', 'Address updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error updating address: ' . $e->getMessage());
        }
    }
    public function uploadAvatar(Request $request)
{
    $request->validate([
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Changed from 'user_avatar' to 'avatar' to match form
    ]);

    $customer = auth()->guard('customer')->user(); // Changed to use your customer guard

    if ($request->hasFile('avatar')) {
        // Delete old avatar if exists
        if ($customer->user_avatar && Storage::exists('public/' . $customer->user_avatar)) {
            Storage::delete('public/' . $customer->user_avatar);
        }

        // Store new avatar with proper path
        $avatarPath = $request->file('avatar')->store('avatars', 'public'); // Store in public/avatars
        
        // Update user avatar path (store relative path)
        $customer->user_avatar = str_replace('public/', '', $avatarPath);
        $customer->save();

        return redirect()->back()->with('success', 'Avatar updated successfully!');
    }

    return redirect()->back()->with('error', 'No avatar file was uploaded.');
}
}