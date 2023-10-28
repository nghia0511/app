<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use App\QueryFilters\UserId;
use App\QueryFilters\Type;
use App\QueryFilters\OrderBy;
use App\Http\Requests\GetActivityLogRequest;

class ActivityLogController extends Controller
{
	/**
	 * get ActivityLogs
	 * support filter by  `user_id`, `type` and order by `id`
	 * 
	 * @example http://localhost/api/activity-logs?user_id=1&type=login&order_by=id&sort=desc
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index(GetActivityLogRequest $request): \Illuminate\Http\JsonResponse
	{
		/** @var \Illuminate\Database\Query\Builder $query */
		$query = app(Pipeline::class)
		->send(ActivityLog::query())
		->through([
			UserId::class,
			Type::class,
			OrderBy::class,
		])
		->thenReturn();
		
		$logs = $query->paginate($request->input('per_page', 15));
		return response()->json($logs);
	}
}
