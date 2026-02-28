<?php

namespace App\Http\Controllers;

use App\Http\Requests\BorrowingInsertRequest;
use App\Http\Requests\BorrowingUpdateRequest;
use App\Http\Resources\BorrowingResource;
use App\Models\borrowing;
use Exception;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
       $query = borrowing::with('book','member');
       if($request->has('search')){
       $search = $request->search;
       $query->where('book_id','LIKE',"%{$search}%")
       ->orWhere('member_id','LIKE',"%{$search}%");
       }
      $borrowing = $query->paginate(10);
       return BorrowingResource::collection($borrowing);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BorrowingInsertRequest $request)
    {
        //
      $borrowing = borrowing::create($request->validated());
      $borrowing->load(['book','member']);
      return response()->json([
        "date"=>$borrowing,
      ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
       $borrow = borrowing::findOrFail($id);
       $borrow->load(['book','member']);
       return new BorrowingResource($borrow);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BorrowingUpdateRequest $request, string $id)
    {
        //
       $borrow = borrowing::findOrFail($id);
       $borrow->update($request->validated());
       return response()->json([
        "borrowing"=>$borrow,
       ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try{
       $borrow = borrowing::findOrFail($id);
       $borrow->delete();
       return response()->json([
        "massage"=>"one item deleted",
       ]);
        }catch(Exception $error){
            return response()->json([
                "error"=>"something went wrong",
            ]);
        }
    }
}
