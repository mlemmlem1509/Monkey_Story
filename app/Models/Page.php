<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Page extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'pages';
    protected $primaryKey = 'idPage';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['pageNumber', 'storyID', 'imageID'];
    protected $hidden = ['storyID', 'imageID'];

    public function story():BelongsTo{
        return $this -> belongsTo(Story::class,'storyID');
    }
    public function images():BelongsTo{
        return $this -> belongsTo(Image::class,'imageID');
    }
    public function texts():HasMany{
        return $this -> hasMany(Text::class);
    }
    public function contents():HasMany{
        return $this -> hasMany(PageContent::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
