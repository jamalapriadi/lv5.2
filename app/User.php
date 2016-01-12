<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules=[
        'nama'=>'required',
        'email'=>'required|email',
        'password'=>'required',
        'level'=>'required'
    ];

    public static $pesan=[
        'nama.required'=>'Nama harus diisi',
        'email.required'=>'Email harus diisi',
        'email.email'=>'Email tidak valid',
        'level.required'=>'Level harus diisi'
    ];
}
