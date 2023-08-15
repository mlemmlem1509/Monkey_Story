<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Image extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'images';
    protected $primaryKey = 'idImage';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['name', 'path'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*']);
    }
}
