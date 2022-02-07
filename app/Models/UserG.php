<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserG extends Model 
{
    use HasFactory;
    
    protected $table="UserG";
    public $timestamps = false;
    protected $primaryKey = "ID";
    public $incrementing = true;
    protected $keyType='int';
    protected $fillable=['ID', 'FullName','Email','Password'];


}
