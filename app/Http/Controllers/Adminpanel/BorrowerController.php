<?php

namespace App\Http\Controllers\Adminpanel;
use App\Http\Controllers\Controller;
use App\Models\History;
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
        $borrowers = Borrower::all();
        $data2 = Borrower::where('return_status', 'Belum Dikembalikan')->get();
        return view('adminpanel.borrower.index', compact('members', 'books', 'borrowers', 'data2'));
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
        return redirect()->route('borrower.index')->with('success', 'Added!');
    }

    public function changeStatusBorrower(Request $request){
        $b = Borrower::find($request->borrowerId);
        $b->date_return = now();
        $b->return_status = 'Dikembalikan';
        $b->update();
        return redirect()->route('borrower.index')->with('success', 'Updated!');
    }

}
