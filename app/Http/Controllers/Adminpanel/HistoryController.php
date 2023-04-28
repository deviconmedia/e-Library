<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrower;
use App\Models\Member;

class HistoryController extends Controller
{
    //Get my histories
    public function index(){
        $member = Member::where('email', auth()->user()->email)->first();
        if ($member['id'] == null){
            return view('memberpanel.my_history');
            die();
        }else{
            $bData = Borrower::where('member_id', $member['id'])->get();
            return view('memberpanel.my_history', compact('bData'));
        }
    }
}
