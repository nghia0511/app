<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class UserId
{
    public function handle(Builder $query, \Closure $next)
    {
        $userId = request()->input('user_id');
        if ($userId) {
            $query->where('user_id', $userId);
        }

        return $next($query);
    }
}