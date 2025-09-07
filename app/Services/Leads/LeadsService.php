<?php

namespace App\Services\Leads;

use App\Repositories\Companies\CompaniesRepository;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\LengthAwarePaginator;

readonly class LeadsService
{
	public function __construct(
		private CompaniesRepository $companiesRepository
	)
	{
	}

	public function getLeads($request): LengthAwarePaginator|AbstractPaginator
	{
		return $this->companiesRepository->fetchAllLeads($request);
	}
}
