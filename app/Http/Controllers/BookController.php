<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookInsertRequest;
use App\Http\Requests\BooKUpdateRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Exception;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
      $book = Book::with('author')->paginate(10);
      return BookResource::collection($book);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookInsertRequest $request)
    {
        //
       $books =Book::create($request->validated());
       $books->load('author');
        return new BookResource($books);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //

        // first way
    //     try{
    //   $book = Book::findOrFail($id);
    //   $book->load('author');
    //   return new BookResource($book);
    //     }catch(Exception $error){
    //         return response()->json([
    //             "error"=>"Book not found"
    //         ]);
    //     }
    // end first way
    // second way
    $book->load('author');
    return new BookResource($book);
    // end second way
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BooKUpdateRequest $request, Book $book)
    {
        //
        $book->update($request->validated());
       $book->load('author');
       return new BookResource($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    //   $book = Book::findOrFail($id);
    //   $book->delete();
    //   return response()->json([
    //     "massage"=>"One item Deleted",
    //   ]);
    try{
     $book = Book::findOrFail($id);
     $book->delete();
     return response()->json([
        "massage"=>$book->title. "deleted successussfully",
     ]);
    }catch(Exception $error){
        return response()->json([
            "error"=>"Something went wrong"
        ]);
    }
    }
}
