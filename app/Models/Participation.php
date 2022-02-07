<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;
    protected $table="Participation";
    public $timestamps = false;
    protected $primaryKey = "ID";
    public $incrementing = true;
    protected $keyType='int';
    protected $fillable=['ID', 'EventID','ParticipantID','Accepted', 'Contribution'];
}
