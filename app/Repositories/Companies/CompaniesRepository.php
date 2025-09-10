<?php

namespace App\Repositories\Companies;

use App\Contracts\Repositories\CompaniesRepositoryInterface;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\LengthAwarePaginator;

class CompaniesRepository implements CompaniesRepositoryInterface
{
	public function fetchAllLeads(Request $request): LengthAwarePaginator|AbstractPaginator
	{
		$query = Company::query()
			->where('company_type', 'lead');

		if ($request->filled('search')) {
			$search = $request->get('search');
			$query->where(function($q) use ($search) {
				$q->where('name', 'like', "%{$search}%")
					->orWhere('email', 'like', "%{$search}%")
					->orWhere('phone_number', 'like', "%{$search}%");
			});
		}

		if ($request->filled('sortBy')) {
			$query->orderBy(
				$request->get('sortBy'),
				$request->get('sortOrder', 'asc')
			);
		}

		$perPage = $request->get('per_page', 10);

		return $query->paginate($perPage)->appends($request->all());
	}

	public function getLeadById(int $id): ?Company
	{
		return Company::query()
			->where('id', $id)
			->first();
	}
}
