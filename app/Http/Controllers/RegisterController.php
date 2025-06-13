<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmailLog;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Single validation block with confirmation rule
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Send the welcome email
        Mail::to($user->email)->send(new WelcomeMail($user));

        // Log that we sent the email
        EmailLog::create([
            'user_id' => $user->id,
            'email'   => $user->email,
            'subject' => 'Welcome Email',  //mailable’s subject
            'sent_at' => now(),
        ]);
        
        // Redirect back to the users form with success message
        return redirect()->route('users.index')->with('success', 'Registration successful! Check your email.');
        // return redirect()->route('register.form')->with('success', 'Registration successful! Check your email.');
    }
}
