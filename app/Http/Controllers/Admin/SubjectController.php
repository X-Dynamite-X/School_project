<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use App\Models\SubjectUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        $subjectUsers = SubjectUser::all();
        return view("admin.subject", [ 'subjects' => $subjects , "subjectUsers"=>$subjectUsers ]);
    }
    public function store(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                "subject_code" => "required|min:3|max:6|unique:subjects",
                'success_mark' => 'required|numeric|min:0',
                'full_mark' => 'required|numeric|min:0|gte:success_mark',
            ],
            [
                'subject_input.required' => 'The subject field is required',
                'subject_code.required' => 'The code field is required',
                'success_mark.required' => 'The minimum mark field is required',
                'full_mark.required' => 'The full mark field is required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => 'Validation failed', 'message' => $validator->errors()], 422);
        }
        $subject = Subject::create([
            'name' => $request->input('name'),
            'subject_code' => $request->input('subject_code'),
            'success_mark' => $request->input('success_mark'),
            'full_mark' => $request->input('full_mark'),
        ]);
        return response()->json($subject);
    }
    public function update(Request $request, string $id){
        $subject = Subject::find($id);

        if (!$subject) {
            return response()->json(['error' => 'Subject not found'], 404);
        }

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'subject_code' => "required|min:3|max:6|unique:subjects,subject_code,$id",
                'success_mark' => 'required|numeric|min:0',
                'full_mark' => 'required|numeric|min:0|gte:success_mark',
            ],
            [
                'name.required' => 'The name field is required',
                'subject_code.required' => 'The subject code field is required',
                'success_mark.required' => 'The minimum mark field is required',
                'full_mark.required' => 'The full mark field is required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => 'Validation failed', 'message' => $validator->errors()], 422);
        }

        $subject->name = $request->input('name');
        $subject->subject_code = $request->input('subject_code');
        $subject->success_mark = $request->input('success_mark');
        $subject->full_mark = $request->input('full_mark');
        $subject->save();

        return response()->json($subject);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return response()->json([], 404);
        }

        $subject->delete();
        return response()->json(["message"=>"Delete Successfuly"]);
    }
}
