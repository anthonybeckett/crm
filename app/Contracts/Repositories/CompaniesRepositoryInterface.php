<?php

namespace App\Contracts\Repositories;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\LengthAwarePaginator;

interface CompaniesRepositoryInterface
{
	public function fetchAllLeads(Request $request): LengthAwarePaginator|AbstractPaginator;

	public function getLeadById(int $id): ?Company;
}
