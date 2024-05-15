<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("admin.user", ['users' => $users]);
    }
    public function getUser()
    {
        $users = User::all();

        return DataTables::of($users)
            ->addColumn('roles', function ($user) {
                $roles = '';
                foreach ($user->getRoleNames() as $role) {
                    $roles .= ' <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">' . $role . '</span><br>';
                }
                return $roles;
            })
            ->rawColumns(['roles',"Action"])

            ->addColumn("Action","admin.dataTables.user.actionUserTable")
            ->toJson();
    }

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
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                "email" => "required|email|unique:users",
                'password' => 'required|string|min:3|confirmed',
            ],
            [
                'name.required' => 'The name field is required',
                'email.required' => 'The email field is required',
                'email.unique' => 'The email field is already exist',
                'password.confirmed' => 'The password confirmation does not match.',

            ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => 'Validation failed', 'message' => $validator->errors()], 422);
        }

        $user = User::create([
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "password" => $request->input('password'),
        ]);
        return response()->json($user);

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
