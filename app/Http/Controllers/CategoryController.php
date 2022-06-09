<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $category = DB::table('categories')->get();
        $data = array(
            'title' => 'Category',
            'category' => $category
        );
        return view('category', $data);
    }

    public function create()
    {
        $data = array(
            'title' => 'Add Category',
        );
        return view('create_category', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        DB::table('categories')->insert([
            'name' => $request->name,
        ]);
        return redirect('category')->with('status', 'Data successfully added');
    }

    public function update($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        $data = array(
            'title' => 'Edit Category',
            'category'  => $category,
        );
        return view('edit_category', $data);
    }

    public function updateProcess(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);


        DB::table('categories')->where('id', $id)->update([
            'name' => $request->name,
        ]);
        return redirect('category')->with('status', 'Data successfully updated');
    }

    public function delete($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect('category')->with('status', 'Data successfully deleted');
    }
}
