<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->get();
        return view('adminpanel.book.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('adminpanel.book.create', compact('categories', 'publishers'));
    }

    public function storeBook(Request $request)
    {
      $validated = Validator::make($request->all(), [
        'etIsbn'     => 'required',
        'etJudul'   => 'required',
        'etKategori'  => 'required',
        'etPenerbit'  => 'required',
        'etPenulis' => 'required',
        'etTahun'     => 'required|numeric',
        'etStok'   => 'required|numeric',
      ], [
        'etIsbn.required' => 'ISBN tidak boleh kosong',
        'etJudul.required' => 'Judul tidak boleh kosong',
        'etKategori.required' => 'Penerbit tidak boleh kosong',
        'etPenerbit.required' => 'Penerbit tidak boleh kosong',
        'etPenulis.required' => 'Penulis tidak boleh kosong',
        'etTahun.required' => 'Tahun tidak boleh kosong',
        'etTahun.numeric' => 'Tahun hanya boleh di isi angka!',
        'etStok.required' => 'Stok tidak boleh kosong',
        'etStok.numeric' => 'Stok hanya boleh di isi angka!',
      ]);

      if($validated->fails()) {
        return redirect()->back()->withErrors($validated)->withInput();
      }else{
            $book = new Book();
            $book->category_id = $request->etKategori;
            $book->publisher_id = $request->etPenerbit;
            if($request->etSampul != null){
                $imgValidated = Validator::make($request->all(), [
                    'etSampul' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:512',
                ], [
                    'etSampul.required' => 'Sampul tidak boleh kosong',
                    'etSampul.image' => 'Format gambar salah!',
                    'etSampul.mimes' => 'Format gambar salah!',
                    'etSampul.max' => 'Ukuran file yang di upload maksimal 500kb',
                ]);
                if($imgValidated->fails()) {
                    return redirect()->back()->withErrors($imgValidated)->withInput();
                }else{
                    $imageName = time() . rand() . '.' . $request->etSampul->extension();
                    $request->etSampul->move(public_path('uploads'), $imageName);
                    $book->sampul = $imageName;
                }

            }else{
                 $book->sampul = 'sampul_default.jpeg';
            }
            $book->isbn         = $request->etIsbn;
            $book->title        = $request->etJudul;
            $book->author       = $request->etPenulis;
            $book->year       = $request->etTahun;
            $book->stock       = $request->etStok;
            $book->information   = $request->etKeterangan;
            $book->save();
            return redirect()->route('book.index');
      }
    }

    public function showBook($id){
        $book = Book::find($id);
        return view('adminpanel.book.show', compact('book'));
    }

    public function editBookById($id)
    {
        $book = Book::find($id);
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('adminpanel.book.edit', compact('book', 'categories', 'publishers'));
    }

    public function updateBookById(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'etIsbn'     => 'required',
            'etJudul'   => 'required',
            'etKategori'  => 'required',
            'etPenerbit'  => 'required',
            'etPenulis' => 'required',
            'etTahun'     => 'required|numeric',
            'etStok'   => 'required|numeric',
          ], [
            'etIsbn.required' => 'ISBN tidak boleh kosong',
            'etJudul.required' => 'Judul tidak boleh kosong',
            'etKategori.required' => 'Penerbit tidak boleh kosong',
            'etPenerbit.required' => 'Penerbit tidak boleh kosong',
            'etPenulis.required' => 'Penulis tidak boleh kosong',
            'etTahun.required' => 'Tahun tidak boleh kosong',
            'etTahun.numeric' => 'Tahun hanya boleh di isi angka!',
            'etStok.required' => 'Stok tidak boleh kosong',
            'etStok.numeric' => 'Stok hanya boleh di isi angka!',
          ]);

          if($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
          }else{
               $book = Book::find($request->bookId);  
                $book->category_id = $request->etKategori;
                $book->publisher_id = $request->etPenerbit;
                $book->isbn         = $request->etIsbn;
                $book->title        = $request->etJudul;
                $book->author        = $request->etPenulis;
                $book->year        = $request->etTahun;
                $book->stock        = $request->etStok;
                $book->information        = $request->etKeterangan;
                $book->update();
                
                return redirect()->back()->with('success', 'Updated!');
          }
        
    }

    public function deleteBookById()
    {
        $book = Book::find(request()->bookId);
        $book->delete();
        return redirect()->route('book.index');
    }

    //update sampul buku
    public function updateBookCover(Request $request){
        $validated = Validator::make($request->all(), [
            'etSampul' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:512',
        ], [
            'etSampul.required' => 'Sampul tidak boleh kosong',
            'etSampul.image' => 'Format gambar salah!',
            'etSampul.mimes' => 'Format gambar salah!',
            'etSampul.max' => 'Ukuran file yang di upload maksimal 500kb',
        ]);

        if($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }else{
            $book = Book::find($request->bookId);
            $imageName = time() . rand() . '.' . $request->etSampul->extension();
            $request->etSampul->move(public_path('uploads'), $imageName);
            $book->sampul = $imageName;
            $book->update();
            return redirect()->back()->with('success', 'Updated!');
        }
    }

    public function  categories()
    {
        $categories = Category::all();
        return view('adminpanel.category.index', compact('categories'));
    }

    public function newCategory(Request $request)
    {
        $category   = new Category();
        $category->category_name = $request->nama_kategori;
        $category->save();
        return redirect()->route('book.categories');
    }

    public function updateCategory(Request $request)
    {
        $category   = Category::find($request->id);
        $category->category_name = $request->nama_kategori;
        $category->update();
        return redirect()->route('book.categories');
    }

    public function deleteCategory(Request $request)
    {
        $category   = Category::find($request->id);
        $category->delete();
        return redirect()->route('book.categories');
    }

    public function publishers()
    {
        $publishers = Publisher::orderBy('id', 'desc')->get();
        return view('adminpanel.publisher.index', compact('publishers'));
    }

    public function newPublisher(Request $request)
    {
        $publisher   = new Publisher();
        $publisher->publisher_name = $request->nama_penerbit;
        $publisher->save();
        return redirect()->route('book.publishers');
    }
}
