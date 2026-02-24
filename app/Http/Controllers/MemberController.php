<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberInsertRequest;
use App\Http\Requests\MemberUpdateRequest;
use App\Http\Resources\MemberResource;
use App\Models\member;
use Exception;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
       $query = member::with('borrowing','activeBorrowing');
       if($request->has('search')){
        $searchTerm = $request->search;
        $query->where(function($q)use($searchTerm){
        $q->where('name','LIKE',"%{$searchTerm}%")
        ->orWhere('email','LIKE',"%{$searchTerm}%")
        ->orWhereHas('activeBorrowing',function($bookQuery)use($searchTerm){
            $bookQuery->where('title','LIKE',"%{$searchTerm}%");
        });
        });
       }
      $member = $query->get();

       return MemberResource::collection($member);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberInsertRequest $request)
    {
        //
       $member = member::create($request->validated());
        return new MemberResource($member);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
       $member = member::firstOrFail($id);
       return new MemberResource($member);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberUpdateRequest $request, string $id)
    {
        //
       $member = member::findOrFail($id);
       $member->update($request->validated());
       return response()->json([
        "member"=>$member,
       ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try{
      $member = member::findOrFail($id);
      $member->delete();
      return response()->json([
        "massage"=>$member->name. "deleted successussfully",
     ]);}catch(Exception $error){
        return response()->json([
            "massage"=>"Something went wrong",
        ]);
      }
    }
}
