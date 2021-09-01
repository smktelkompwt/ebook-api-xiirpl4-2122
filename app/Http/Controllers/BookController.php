<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // select * from book;
        $book =  Book::all();
        return [
            "status" => "200",
            "message" => "Load books is success",
            "data" => $book
        ];

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Book::create([
            "title" => $request->title,
            "description" => $request->description,
            "publisher" => $request->publisher,
            "author" => $request->author,
            "page" => $request->page,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // select * from book where id=$id
        // return Book::get($id)->first();
        $book = Book::find($id);
        if($book){
            return [
                "status" => "200",
                "message" => "Load book is success",
                "data" => $book
            ];
        }else{
            return [
                "status" => "405",
                "message" => "Book not found"
            ];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if($book){
            $book->title = $request->title;
            $book->description = $request->description;
            $book->publisher = $request->publisher;
            $book->author = $request->author;
            $book->page = $request->page;
            $book->save();

            return [
                "status" => "204",
                "message" => "Edit book is success"
            ];
        }else{
            return [
                "status" => "405",
                "message" => "Book not found"
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if($book){
            $book->delete();

            return [
                "status" => "204",
                "message" => "Remove book is success"
            ];
        }else{
            return [
                "status" => "405",
                "message" => "Book not found"
            ];
        }
    }
}
