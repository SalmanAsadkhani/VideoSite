<?php

namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class VideoFilter
{

  private $builder;

    public function  __construct(Builder $builder)
    {
        $this->builder = $builder;
    }


    public function apply(array $params)
    {

        foreach ($params as $methodName => $value)
        {
            $this->$methodName($value);

            return $this->builder;
        }

    }

//    private  function sortBy($value)
//    {
//        if ($value == 'created_at')
//        {
//            $this->builder->orderBy('created_at' , 'desc');
//        }
//
//        if ($value == 'like') {
//            $this->builder->leftJoin('likes', function ($join) {
//                $join->on('likes.likeable_id', '=', 'videos.id')
//                    ->where('likes.likeable_type', '=', 'App\Models\Video')
//                    ->where('likes.vote', '=', 1);
//            })
//                ->groupBy(
//                    'videos.id',
//                    'videos.name',
//                    'videos.path',
//                    'videos.length',
//                    'videos.created_at',
//                    'videos.updated_at',
//                    'videos.slug',
//                    'videos.description',
//                    'videos.thumbnail',
//                    'videos.category_id',
//                    'videos.user_id'
//                )
//                ->select([
//                    'videos.id',
//                    'videos.name',
//                    'videos.path',
//                    'videos.length',
//                    'videos.created_at',
//                    'videos.updated_at',
//                    'videos.slug',
//                    'videos.description',
//                    'videos.thumbnail',
//                    'videos.category_id',
//                    'videos.user_id',
//                    DB::raw('count(likes.id) as count'),
//                ])
//                ->orderBy('count', 'desc');
//        }
//
//        if ($value  == 'length')
//        {
//            $this->builder->orderBy('length' , 'desc');
//
//        }
//
//    }
//
//    private function length($value)
//    {
//        if ( $value  == 1  ) {
//
//            $this->builder->where('length' , '<' , 60);
//        }
//
//        if ($value == 2  ) {
//
//            $this->builder->whereBetween('length' , [60 , 300]);
//        }
//
//        if ($value == 3  ) {
//
//            $this->builder->where('length' , '>' , 300);
//        }
//
//    }

    private function q($value)
    {
            $this->builder->where('name', 'LIKE', "%{$value}%");

    }


}
