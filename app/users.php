<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    public $timestamps = false;

    protected $table = 'user';

    protected $fillable = [
        'user_id', 'firstname', 'lastname', 'nickname', 'username', 'password', 'create_at', 'update_at', 
        'remember_token', 'birthday', 'age', 'gender', 'email', 'tel', 'address', 'experience',
        'ref_name', 'ref_relation', 'ref_tel', 'school', 'level', 'grade', 'img_profile', 'img_card',
        'card_id', 'role_id', 'status_user_id'
    ];
    
    protected $primaryKey = 'user_id';
}
