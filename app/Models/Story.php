<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Story extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'stories';
    protected $primaryKey = 'idStory';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['name', 'authorName', 'illustratorName', 'imageID'];
    protected $hidden = ['imageID'];

    public function images():BelongsTo{
        return $this -> belongsTo(Image::class, 'imageID');
    }
    public function pages():HasMany{
        return $this->hasMany(Page::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
