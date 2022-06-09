<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{

    public function home()
    {
        $book = Book::all();
        $data = array(
            'title' => 'Book',
            'book' => $book
        );
        return view('home', $data);
    }

    public function index()
    {
        $book = Book::all();
        $data = array(
            'title' => 'Book',
            'book' => $book
        );
        return view('book', $data);
    }

    public function create()
    {
        $category = Category::all();
        $data = array(
            'title' => 'Add Book',
            'category' => $category
        );
        return view('create_book', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:books',
            'summary' => 'required',
            'category' => 'required',
        ]);

        $slug = str_replace(' ', '-', strtolower($request->title));

        DB::table('books')->insert([
            'category_id' => $request->category,
            'title' => $request->title,
            'slug' => $slug,
            'summary' => $request->summary,
        ]);
        return redirect('book')->with('status', 'Data successfully added');
    }

    public function update($slug)
    {
        $book = DB::table('books')->where('slug', $slug)->first();
        $category = Category::all();
        $data = array(
            'title' => 'Edit Book',
            'book'  => $book,
            'category' => $category
        );
        return view('edit_book', $data);
    }

    public function updateProcess(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'category' => 'required',
        ]);

        $updatedslug = str_replace(' ', '-', strtolower($request->title));

        DB::table('books')->where('slug', $slug)->update([
            'category_id' => $request->category,
            'title' => $request->title,
            'slug' => $updatedslug,
            'summary' => $request->summary,
        ]);
        return redirect('book')->with('status', 'Data successfully updated');
    }

    public function delete($slug)
    {
        DB::table('books')->where('slug', $slug)->delete();
        return redirect('book')->with('status', 'Data successfully deleted');
    }
}
