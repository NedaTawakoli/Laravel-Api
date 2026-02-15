<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookInsertRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
      $book = Book::all();
      return response()->json([
        "book"=>$book,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       $books =Book::create([
        "title"=>$request->title,
        "isbn"=>$request->isbn,
        "description"=>$request->description,
        "published_at"=>$request->published_at,
        "totol_copies"=>$request->total_copies,
        "available_copies"=>$request->available_copies,
        "cover_image"=>$request->cover_image,
        "status"=>$request->status,
        "price"=>$request->price,
        "author_id"=>$request->author_id,
        "genre"=>$request->genre
       ]);
    //    return response()->json([
    //     "book"=>$book,
    //    ]);
        return new BookResource($books);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
      $book = Book::findOrFail($id);
      return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
       $book = Book::findOrFail($id);
       $book->update($request->validated());
       return response()->json([
        "book"=>$book,
       ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
      $book = Book::findOrFail($id);
      $book->delete();
      return response()->json([
        "massage"=>"One item Deleted",
      ]);
    }
}
