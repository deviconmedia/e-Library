<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class WebController extends Controller
{
    public function index(){
        return view('welcome');
    }

    //List buku
    public function daftarBuku(){
        $books = Book::orderBy('id', 'desc')->get();
        return view('daftar_buku', compact('books'));
    }
    //Detail Buku
    public function detailBuku($id){
        $book = Book::find($id);
        return view('detail_buku', compact('book'));
    }
    //About
    public function tentang(){
        return view('tentang');
    }
}
