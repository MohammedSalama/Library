<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('layouts.books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {

        /*
         * Move Logo
         */
        $img = $request -> file('img');
        $ext = $img->getClientOriginalExtension();
        $name = "Book-".uniqid() . ".$ext";
        $img -> move( public_path('storage/') , $name);

        Book::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'img' => $name
        ]);
        session()->flash('Add', __('Book Data Added Successfully') );
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $books = Book::findorfail($id);
        return view ('layouts.books.edit',compact('books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $books = Book::findorFail($request->id);

        $name = $books -> img;

        if($request->hasFile('img'))
        {
            $img = $request -> file('img');
            $ext = $img->getClientOriginalExtension();
            $name = "Book-".uniqid() . ".$ext";
            $img -> move( public_path('storage') , $name);
        }
        $books->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'img' => $name
        ]);
        session()->flash('Edit','Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            Book::destroy($request->book_id);
            session()->flash('Deleted', 'Data has been deleted successfully');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
