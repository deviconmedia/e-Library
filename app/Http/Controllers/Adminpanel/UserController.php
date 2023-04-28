<?php

namespace App\Http\Controllers\Adminpanel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //User Management
    public function index(){
        $users = User::where('level', '!=', 'Member')->get();
        return view('adminpanel.user-management.index', compact('users'));
    }

    //Create new user
    public function newUser(){
        return view('adminpanel.user-management.create');
    }

    public function newUserStore(Request $request){
        //Input validation
        $validated = Validator::make($request->all(), [
            'etName' => 'required',
            'email' => 'required|email|unique:users',
            'etLevel' => 'required',
            'etPass' => 'required|min:3|required_with:etPassConf|same:etPassConf',
            'etPassConf' => 'required|min:3'
        ], [
            'etName.required' => 'Field wajib di isi!',
            'email.required' => 'Field wajib di isi!',
            'email.email' => 'Format email salah!',
            'email.unique' => 'Email sudah digunakan, coba gunakan email yang lain!',
            'etLevel.required' => 'Field wajib di isi!',
            'etPass.required' => 'Field wajib di isi!',
            'etPass.min' => 'Kata sandi minimum adalah 3 karakter',
            'etPassConf.required' => 'Field wajib di isi!',
            'etPass.same' => 'Konfirmasi kata sandi salah!',
            'etPassConf.min' => 'Kata sandi minimum adalah 3 karakter'
        ]);
        if($validated->fails()){
            return redirect()->back()->withErrors($validated)->withInput();
        }else{
            $u = new User();
            $u->name = $request->etName;
            $u->email = $request->email;
            $u->password = Hash::make($request->etPass);
            $u->level = $request->etLevel;
            $u->status = 'active';
            $u->save();
            return redirect()->route('user-management.index')->with('success', 'Added!');
        }
    }
    //Delete a User
    public function deleteUser(Request $request){
        $u = User::find($request->userId);
        $u->delete();
        return redirect()->route('user-management.index')->with('success', 'Deleted!');
    }
    //Enable or Disable a User
    public function changeUserStatus(Request $request){
        $u = User::find($request->userId);
        //Change status where enabled button is click
        if($u->status == 'active'){
            $u->status = 'inactive';
            $u->update();
        }else{
            $u->status = 'active';
            $u->update();
        }
        return redirect()->back()->with('success', 'Updated!');
    }
    //Update User pass
    public function passUserChange(Request $request){
        $u = User::find($request->userId);
        $u->password = Hash::make($request->etNewPass);
        $u->update();
        return redirect()->back()->with('success', 'Kata Sandi telah di ubah!');
    }
}
