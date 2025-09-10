<?php

use App\Repositories\Companies\CompaniesRepository;
use App\Services\Leads\LeadsService;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

beforeEach(function () {
	$this->companiesRepository = Mockery::mock(CompaniesRepository::class);
	$this->service = new LeadsService($this->companiesRepository);
});

afterEach(function () {
	Mockery::close();
});

it('fetches all leads via repository', function () {
	$request = Request::create('/leads', 'GET', ['filter' => 'test']);

	$paginator = Mockery::mock(LengthAwarePaginator::class);

	$this->companiesRepository
		->shouldReceive('fetchAllLeads')
		->once()
		->with($request)
		->andReturn($paginator);

	$result = $this->service->getLeads($request);

	expect($result)->toBe($paginator);
});

it('fetches a single lead by id', function () {
	$companyId = 123;
	$company = new Company(['id' => $companyId, 'name' => 'Test Company']);

	$this->companiesRepository
		->shouldReceive('getLeadById')
		->once()
		->with($companyId)
		->andReturn($company);

	$result = $this->service->getLeadById($companyId);

	expect($result)->toBe($company);
});

it('returns null if lead not found', function () {
	$companyId = 999;

	$this->companiesRepository
		->shouldReceive('getLeadById')
		->once()
		->with($companyId)
		->andReturnNull();

	$result = $this->service->getLeadById($companyId);

	expect($result)->toBeNull();
});
