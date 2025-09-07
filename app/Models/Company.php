<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

	protected $fillable = [
		'name',
		'company_number',
		'company_type',
		'address_line1',
		'address_line2',
		'city',
		'state',
		'postal_code',
		'country',
		'phone_number',
		'email',
		'website_url',
		'industry',
		'size',
		'annual_revenue',
	];
}
