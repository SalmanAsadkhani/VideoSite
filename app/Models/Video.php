<?php

namespace App\Models;

use App\Filters\VideoFilter;
use App\Models\Traits\Favoriteable;
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
    use HasFactory , Likeable ,SoftDeletes ;

    protected $fillable = [
        'name',
        'description',
        'length',
        'path',
        'slug',
        'thumbnail',
        'category_id',
        'status',
        'rating'
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
        return $this->hasMany(Comment::class);
    }

    public function favorites(){
        return $this->hasMany(Favorite::class);
    }


    public function getVideoUrlAttribute()
    {
//        return   Storage::url($this->path);
        return '/storage/' . $this->path;
    }

    public function getVideoThumbnailAttribute()
    {

        return '/storage/' . $this->thumbnail;

    }

    public function getVideoDownloaderAttribute()
    {
        return  '/storage/' .$this->path;
    }

    public function scopeFilters(Builder $builder , array $params)
    {
        return (new VideoFilter($builder))->apply($params);
    }


    public function scopeSearch(Builder $builder , array $params)
    {
        if (isset($params['q'])) {
            $builder->where('name', 'like', "%{$params['q']}%");
        }

        return $builder;
    }


    public function ratings()
    {
        return $this->hasMany(VideoRating::class);
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating') ?? 0;
    }
}
