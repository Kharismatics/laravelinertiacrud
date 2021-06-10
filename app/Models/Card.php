<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Auth;

class Card extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_create', 'name', 'minimal', 'maximal', 'istrue', 'ability',
    ];
}
