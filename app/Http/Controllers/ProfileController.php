<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\School;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\Agent\AgentCreateRequest;
use App\Http\Requests\Agent\AgentUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request)
    {
        $data = User::all();

        return view('admin.users.index',compact('data'));
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        $schools = School::all();
        return view('admin.users.create',compact('roles' , 'schools'));
    }
     
    public function edit(Request $request): View
    {
        $roles = Role::pluck('name','name')->all();
        $userRole = $request->user()->roles->pluck('name','name')->all();
        $schools = School::all();
        // return view('admin.users.edit',compact('user','roles','userRole'));
        return view('admin.users.edit', [
            'user' => $request->user(),
            'roles' => $roles,
            'userRole' => $userRole,
            'schools' => $schools
        ]);
    }
    public function store(AgentCreateRequest $request)
    {
        // dd($request->all());
        // $this->validate($request, [
        //     'name_ar' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|confirm',
        //     'roles' => 'required'
        // ]);
    
        // try to store data into 
        if ($request->roles[0] == 'agent') {
            $user =  User::create([
                'name' => json_encode([
                    'ar' => $request->name_ar,
                    'en' => $request->name_en,
                ]),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'school_id' => $request->school_id,
                'is_agent' => true
            ]);
        }else {
            $user =  User::create([
                'name' => json_encode([
                    'ar' => $request->name_ar,
                    'en' => $request->name_en,
                ]),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'school_id' => $request->school_id
            ]);
        }
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('admin.users.index')
                        ->with('success','User created successfully');
    }
    
    /**
     * Update the user's profile information.
     */
    public function update(AgentUpdateRequest $request ): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->update([
            'name' =>  json_encode([
                'ar' => $request->name_ar,
                'en' => $request->name_en
            ])
        ]);
        $request->user()->save();
        DB::table('model_has_roles')->where('model_id',$request->id)->delete();
    
        $request->user()->assignRole($request->input('roles'));
        return Redirect::route('admin.profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
