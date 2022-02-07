<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table="Event";
    public $timestamps = false;
    protected $primaryKey = "ID";
    public $incrementing = true;
    protected $keyType='int';
    protected $fillable=['ID', 'Title','DateOfEvent','OrganizerID', 'GiftID'];
}
