<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Audio extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'audios';
    protected $primaryKey = 'idAudio';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['name', 'path', 'textID'];
    protected $hidden = ['textID'];

    public function texts():BelongsTo{
        return $this->belongsTo(Text::class, 'textID');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*']);
    }
}
