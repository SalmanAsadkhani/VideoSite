<?php

namespace App\Models;

use App\Filters\VideoFilter;
use App\Models\Traits\Likeable;
use FFMpeg\Filters\Video\VideoFilters;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Comment;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Video extends Model
{
    use HasFactory , Likeable ,SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'length',
        'path',
        'slug',
        'thumbnail',
        'category_id'
    ];

    protected $hidden =  ['path' , 'thumbnail'];
    protected $appends = ['owner-name'];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getLengthInHumanAttribute()
    {
        return gmdate("i:s", $this->length);
    }

    public function getCreatedAtAttribute($value)
    {
        return (new Verta($value))->formatDifference();
    }

    public function relatedVideos(int $count = 6)
    {
        return $this->category->getRandomVideos($count);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategoryNameAttribute()
    {
        return $this->category?->name;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getOwnerNameAttribute()
    {
        return $this->user?->name;
    }

    public function getOwnerAvatarAttribute()
    {
        return $this->user?->gravatar;
    }


    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    public function getVideoUrlAttribute()
    {
//        return   Storage::url($this->path);
        return '/storage/' . $this->path;
    }

    public function getVideoThumbnailAttribute()
    {
        return   Storage::url($this->thumbnail);

    }

    public function scopeFilter(Builder $builder , array $params)
    {
        return (new VideoFilter($builder))->apply($params);
    }

}
