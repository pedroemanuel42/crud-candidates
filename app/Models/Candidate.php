<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $table = 'candidates';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'state', 'city', 'hobbies'];
}
