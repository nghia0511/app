<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class Type
{
    public function handle(Builder $query, \Closure $next)
    {
        $type = request()->input('type');
        if ($type) {
            $query->where('type', $type);
        }
        
        return $next($query);
    }
}