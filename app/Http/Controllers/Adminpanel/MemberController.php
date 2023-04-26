<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
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
        $member->save();
        return redirect()->route('member.index')->with('success', 'Added!');
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
    public function memberControls(Request $request){
        $member = Member::find($request->memberId);
        if($member->status === 'active'){
            $member->status = 'inactive';
        }else{
            $member->status = 'active';
        }
        $member->update();
        return redirect()->route('member.index')->with('success', 'Updated!');
    }
    //Destory (Delete) a member by id
    public function destroyMemberById(Request $request){
        $member = Member::find($request->memberId);
        $member->delete();
        return redirect()->route('member.index')->with('success', 'Deleted!');
    }
}
