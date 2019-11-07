<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ValidatorAPI;
use App\User;
class UserController extends Controller
{
    protected $obj_user ;
    function __construct(){
        $this->obj_user = new User();
    }   
    //function view all users
    public function index()
    {
        $users = $this->obj_user->showAllUser();
        return response()->json(['status' => 200, 'List User' => $users], 200);
    }

    //function get user by user id
    public function getUser($id)
    {
        $user = $this->obj_user->getUser($id);
        if($user == null)
        {
            return response()->json(['status' => 505, 'error' => 'Not found'], 505);
        }else
        {
            return response()->json(['status' => 200, 'List User' => $user], 200);
        }
    }
    //function create user
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ],[
            'name.required' => 'Name required',
            'email.required' => 'Email required',
            'name.min' => 'Name more than 3 character',
            'email.email' => 'Email wrong format',
            'email.unique' => 'Email exist',
            'password.required' => 'Passwrd required',
            'password.min' => 'Password mopre than 6 character',
        ]);

        if ($validator->fails()) { 
            return response()->json(['error' => $validator->errors(), 'status' => 400], 400);            
        }

        $data = $request->all();
        $data['password'] = bcrypt($request['password']);
        $user = $this->obj_user->addUser($data);
        return response()->json(['success'=> 'create success', 'status' => 200], 200);
    }
    //fucntion view information user edit
    public function editUser(Request $request,$id)
    {
        $user = $this->obj_user->find($id);
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
        ],[
            'name.required' => 'Name required',
            'email.required' => 'Email required',
            'name.min' => 'Name more than 3 character',
            'email.email' => 'Email wrong format',
            'email.unique' => 'Email exist',
        ]);

        if ($validator->fails()) { 
            return response()->json(['error' => $validator->errors(), 'status' => 400], 400);            
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return response()->json(['success' => 'Update success'],200);
    }
    //function edit user
    public function editPassword(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'password' => 'required|min:6',
        ],[
            'password.required' => 'Passwrd required',
            'password.min' => 'Password mopre than 6 character',
        ]);

        if ($validator->fails()) { 
            return response()->json(['error' => $validator->errors(), 'status' => 400], 400);            
        }

        $this->obj_user->changepassword($request->all(),$id);
        return response()->json(['success' => 'Update password success'],200);
    }
    //fucntion delete user
    public function deleteUser($id)
    {
        $this->obj_user->deleteUser($id);
        return response()->json(['success' => 'Delete success'], 200);
    }
}
