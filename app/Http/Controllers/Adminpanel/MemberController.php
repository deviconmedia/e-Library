<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index(){
        $members = Member::all();
        return view('adminpanel.member.index', compact('members'));
    }

    //Add new member
    public function newMember(Request $request){
        $member = new Member();
        $member->email = $request->etEmail;
        $member->name = $request->etName;
        $member->pass = Hash::make($request->etPas);
        $saveToMember = $member->save();
        if($saveToMember){
            $u = new User();
            $u->name = $request->etName;
            $u->email = $request->etEmail;
            $u->password = Hash::make($request->etPass);
            $u->level = 'Member';
            $u->status = 'active';
            $u->save();
            return redirect()->route('member.index')->with('success', 'Added!');
        }
    }
    //update member by id
    public function updateMemberById(Request $request){
        $member = Member::find($request->memberId);
        $member->email = $request->etEmail;
        $member->name = $request->etName;
        $member->update();
        return redirect()->route('member.index')->with('success', 'Updated!');
    }
    //Enable or Disable a member
    public function memberControls($memberId){
        $member = Member::find($memberId);
        $u = User::where('email', $member['email'])->get();
        if($member->status === 'active'){
            $member->status = 'inactive';
           if($u[0]['status'] === 'active'){
               $u[0]['status'] = 'inactive';
               $u[0]->update();
           }
        }else{
            $member->status = 'active';
            if($u[0]['status'] === 'inactive'){
                $u[0]['status'] = 'active';
                $u[0]->update();
            }
        }
        $member->update();
        return redirect()->route('member.index')->with('success', 'Updated!');
    }

}
