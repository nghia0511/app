<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

class OrderBy
{
    public function handle(Builder $query, \Closure $next)
    {
        $orderBy = request()->input('order_by');
        $tableName = $query->getModel()->getTable();
        if ($orderBy && $tableName && Schema::hasColumn($tableName, $orderBy)) {
            $sort = request()->input('sort', 'desc');
            $query->orderBy($orderBy, $sort);
        }

        return $next($query);
    }
}