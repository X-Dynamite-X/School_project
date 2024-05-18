<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Subject;
use App\Models\SubjectUser;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SubjectUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_ids' => 'required|array',
                'user_ids.*' => 'numeric|unique:subject_users,user_id,NULL,id,subject_id,' . $request->subjectId,
                'subjectId' => 'required',
            ],
            [
                'user_ids.required' => 'The field is required',
                'subjectId.required' => 'The field is required',

            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => 'Validation failed', 'message' => $validator->errors()], 422);
        }

        $subject = Subject::find($request->subjectId);
        if (!$subject) {
            return response()->json(['error' => 'Invalid subject ID.'], 422);
        }

        foreach ($request->user_ids as $subjectUserId) {
            $user = User::find($subjectUserId);
            if ($user) {
                $user->subjects()->attach($subject, ['mark' => "0"]);
            }
        }
        $users = User::find($request->user_ids);
        return response()->json(["message" => "Doneeeeeeeee", "users_id" => $request->user_ids,"users"=>$users]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id' => 'required',
                'subject_id' => 'required',
                'mark' => 'required|numeric',
            ],
            [
                'user_ids.required' => 'The field is required',
                'subjectId.required' => 'The field is required',
                'mark.required' => 'The field is required',
                'mark.numeric' => 'The you need to type number in this field',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => 'Validation failed', 'message' => $validator->errors()], 422);
        }
        $subjectUser = SubjectUser::where('subject_id', $request->subject_id)
            ->where('user_id', $request->user_id)
            ->first();
        if ($subjectUser) {
            $subjectUser->update(['mark' => $request->mark]);
            return response()->json(["subjectUser" => $subjectUser]);
        }
    }
    public function destroy($subjectId, $subjectUserId)
    {
        $subjectUser = SubjectUser::where("subject_id", $subjectId)
            ->where("user_id", $subjectUserId)->first();
        if ($subjectUser) {
            $subjectUser->delete();

            return response()->json(["message" => "Done Delete ","user"=>$subjectUser]);
        } else {
            return response()->json(["message" => "this user is not found in the subject"]);
        }
    }
}
