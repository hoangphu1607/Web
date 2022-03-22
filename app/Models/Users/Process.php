<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Process extends Model
{
    use HasFactory;
    // declared table use in database 
    protected $table = 'user';

    // function insert data when user register
    public function register($data)
    {
        
        DB::insert('insert into user (u_name, u_email, u_password, u_phone, u_address, u_avatar) 
        values (?, ?, ?, ?, ? ," ")', $data);        
    }
}
