<?php

namespace App\Http\Controllers;

use App\Http\Requests\BorrowingInsertRequest;
use App\Http\Requests\BorrowingUpdateRequest;
use App\Http\Resources\BorrowingResource;
use App\Models\Book;
use App\Models\borrowing;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\Mime\Message;

use function Symfony\Component\Clock\now;

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
        try{
       $book = Book::findOrFail($request->book_id);
       if($book->available_copies>0){
       $borrowing = borrowing::create($request->validated());
        Book::update([
             "available_copies"=>$book->available_copies--
        ]);
        $borrowing->load(['member','book']);
        return new BorrowingResource($borrowing);
       }
       }catch(Exception $error){
        return response()->json([
            'message'=>$error->getMessage(),
        ]);
       }
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
    public function returnBook(borrowing $borrowing){
    if($borrowing->status !=="borrowed"){
        return response()->json([
            "message"=>"this book has already been returned",
        ]);
    }else{
        $borrowing->update([
            "returned_date"=>now(),
            "status"=>"returned",
        ]);
        $borrowing->book->returnBook();
        $borrowing->load(['book','member']);
        return new BorrowingResource($borrowing);
    }
    }
      public function overDue(){
       $overdueBorrowing = borrowing::with(['book','member'])
       ->where('status','borrowed')->where('due_date','<',now())->get();
       borrowing::where('status','borrowed')->where('due_date','<',now())->update(['status'=>'overdue']);
       return borrowing::collection($overdueBorrowing);
    }

}
