<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class PageContent extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'contents';
    protected $primaryKey = 'idPageContent';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['name', 'positionX', 'positionY', 'width', 'height', 'pageID', 'textID'];
    protected $hidden =['pageID', 'textID'];

    public function pages():BelongsTo{
        return $this->belongsTo(Page::class, 'pageID');
    }
    public function texts():BelongsTo{
        return $this->belongsTo(Text::class, 'textID');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
