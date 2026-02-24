<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorInsertRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $queryAuthor = Author::with('book');
        if($request->has('search')){
          $search = $request->search;
          $queryAuthor->where(function($query)use($search){
        $query->where('name','LIKE',"%{$search}%")
        ->orWhere('bio','LIKE',"%{$search}%")
        ->orWhereHas(function($q)use($search){
            $q->where('title','LIKE',"%{$search}%")
            ->orWhere('isbn','LIKE',"%{$search}%");
        });
          });
        }
       $author = $queryAuthor->paginate(10);
       return AuthorResource::collection($author);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorInsertRequest $request)
    {
        //
      $author= Author::create($request->validated());
        return new AuthorResource($author);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
       $author = Author::findOrFail($id);
       return new AuthorResource($author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorInsertRequest $request, string $id)
    {
        //
       $author= Author::findOrFail($id);
      $author->update($request->validated());
      return response()->json([
        "author"=>$author,
      ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
       $author = Author::firstOrFail($id);
       $author->delete();
       return response()->json([
        "error"=>"One item Deleted",
       ]);
    }
}
