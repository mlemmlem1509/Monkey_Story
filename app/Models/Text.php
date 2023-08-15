<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Text extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'texts';
    protected $primaryKey = 'idText';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['name', 'positionX', 'positionY', 'pageID'];
    protected $hidden = ['pageID'];

    public function pages():BelongsTo{
        return $this -> belongsTo(Story::class,'storyID');
    }
    public function audio():HasOne{
        return $this -> hasOne(Audio::class);
    }
    public function contents():HasOne{
        return $this -> hasOne(PageContent::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty();
    }
}
