<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $table = 'audios';

    protected $primaryKey = 'idAudio';

    protected $fillable = [
        'name',
        'path',
        'textID'
    ];

}
