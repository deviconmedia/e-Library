<?php

namespace App\Http\Controllers\Adminpanel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrower;
use App\Models\Member;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;
class BorrowerController extends Controller
{
    public function index(){
        $members = Member::all();
        $books = Book::all();
        return view('adminpanel.borrower.index', compact('members', 'books'));
    }
    //Add new Borrower
    public function newBorrower(Request $request){
        //Store data into borrowers table
        $b = new Borrower();
        $b->member_id = $request->memberId;
        $b->book_id = $request->bookId;
        $b->book_qty = $request->bookQty;
        $b->borrow_date = $request->dateBorrow;
        $b->date_return = $request->dateReturn;
        $b->return_status = 'Belum Dikembalikan';
        $b->information = $request->keterangan;
        $b->save();

        return redirect()->route('borrower.index')->with('success', 'Added!');
    }
}
