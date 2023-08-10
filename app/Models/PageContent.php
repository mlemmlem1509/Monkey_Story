<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;

    protected $table = 'contents';

    protected $fillable = [
        'name',
        'positionX',
        'positionY',
        'width',
        'height'
    ];
}
