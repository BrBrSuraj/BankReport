<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable=['role'];

    public const is_admin=2;
    public const is_member=3;
    public const is_user=4;

     public function user(){
return $this->hasMany(User::class);
    }
}
