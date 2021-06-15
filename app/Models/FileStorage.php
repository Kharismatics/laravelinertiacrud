<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileStorage extends Model
{
    use HasFactory;
    protected $table = 'files';
    protected $fillable = [
        'title', 'filename', 'path', 'model', 'model_id',
    ];
}
