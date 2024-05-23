<?php

namespace App\Http\Controllers\User;

use App\Models\SubjectUser;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = auth()->user()->subjects;

        return view("user.home", ["subjects" => $subjects]);
    }


    // public function getUserInfo()
    // {
    //     $subjects = auth()->user()->subjects->map(function ($subject) {
    //         return [
    //             'id' => $subject->id,
    //             'subjectName' => $subject->name,
    //             'subjectCode' => $subject->subject_code,
    //             'SuccessMark' => $subject->success_mark,
    //             'userMark' => $subject->pivot->mark,
    //             'FullMark' => $subject->full_mark,
    //         ];
    //     });

    //     return response()->json(['data' => $subjects]);
    // }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
