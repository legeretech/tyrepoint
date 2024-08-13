<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\news;
use App\Models\banner;
use App\Models\gallery;
use Illuminate\Support\Facades\Session;

use function PHPSTORM_META\type;

class indexController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $data['first_gallery'] = gallery::skip(0)->take(1)->get();
        $data['gallery'] = gallery::skip(1)->take(6)->get();
        $data['banner'] = banner::skip(0)->take(3)->get();
        $data['news'] = news::orderBy('created_at', 'desc')->take(3)->get();

        return view('index', $data);
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
    public function services()
    {
        return view('services');
    }

    public function adminlogin()
    {
        return view('admin.admin');
    }

    public function doAdminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role->role == 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($user->role->role == 'shop') {
                return redirect('/admin/dashboard');
            } else {
                Auth::logout();
                return redirect('/admin')->withErrors(['email' => 'Unauthorized role'])->withInput();
            }
        }

        return redirect('/admin')->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function contact_action(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contactData = $request->only(['name', 'email', 'phone', 'subject', 'message']);

        Mail::to('aznaassis@example.com')->send(new ContactMail($contactData));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect('/admin');
    }
}
