<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    public function story():HasOne{
        return $this -> hasOne(Story::class);
    }
    public function pages():HasOne{
        return $this -> hasOne(Page::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
