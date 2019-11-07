<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','provider', 'provider_id','gmail_id'
    ];

    protected $table = "users";
    protected $primarykey = "id";
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //function get all user
    public function showAllUser(){
        return User::select('id', 'name', 'email')->get();
    }

    //fucntion get user by user id
    public function getUser($id)
    {
        return User::select('id','name','email')->where('id','=',$id)->first();
    }

    //function add user
    public function addUser($user)
    {
        User::insert([
            'name' =>$user['name'],
            'email' =>$user['email'],
            'password' =>$user['password'],
        ]);
    }

    //fucntion change password
    public function changepassword($data,$id)
    {
        User::where('id','=',$id)->update(['password' => bcrypt($data['password']),]);
    }

    //fucntion delete user
    public function deleteUser($id)
    {
        $user = User::where('id','=',$id)->first();
        $user->delete();
    }
}
