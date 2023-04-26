<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrower;
class BorrowerController extends Controller
{
    public function index(){
        return view('adminpanel.borrower.index');
    }
}
