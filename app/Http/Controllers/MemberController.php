<?php

namespace App\Http\Controllers;

use App\Http\Resources\MemberResource;
use App\Models\member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       $member = member::all();
       return response()->json([
        "member"=>$member,
       ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       $member = member::create([
       "name"=>$request->name,
       "email"=>$request->email,
       "address"=>$request->address,
       "membership_date"=>$request->membership_date,
       "whatsApp_number"=>$request->whatsApp_number,
       "status"=>$request->status,
        ]);
        // return response()->json([
        //     "member"=>$member,
        // ]);
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
    public function update(Request $request, string $id)
    {
        //
       $member = member::findOrFail($id);
       $member->update($request);
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
      $member = member::findOrFail($id);
      $member->delete();
      return response()->json([
        "massage"=>"One item deleted",
      ]);
    }
}
