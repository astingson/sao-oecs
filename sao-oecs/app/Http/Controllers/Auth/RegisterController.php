<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Org;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $orgs = Org::get();

        return view('auth.register', [
            'orgs' => $orgs
        ]);
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'org' => 'required',
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        $org_ids = explode(',', $request->org);
        $org = Org::whereIn('id', $org_ids)->get();
        //dd($org);
        $user->orgs()->attach($org_ids);

        // dd($org_ids);
        // dd($request);

        auth()->attempt($request->only('email', 'password'));


        return redirect()->route('forms.index');
    }
}
