<?php

namespace App\Http\Controllers;

use App\Services\Leads\LeadsService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class LeadsController extends Controller
{
	public function __construct(
		private readonly LeadsService $leadsService
	)
	{
	}

	public function index(Request $request): Response
	{
		$leads = $this->leadsService->getLeads($request);

		return Inertia::render('Leads/Leads', [
			'leads' => $leads,
			'filters' => $request->only(['search', 'sortBy', 'sortOrder']),
		]);
	}
}
