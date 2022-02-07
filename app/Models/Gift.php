<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;
    
    protected $table="Gift";
    public $timestamps = false;
    protected $primaryKey = "ID";
    public $incrementing = true;
    protected $keyType='int';
    protected $fillable=['ID', 'Title','Price','PhotoURL'];
}
