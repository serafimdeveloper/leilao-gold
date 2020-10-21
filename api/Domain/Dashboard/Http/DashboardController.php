<?php 
namespace Domain\Dashboard\Http;

use Domain\Http\Controllers\Controller;


class DashboardController extends Controller
{

	public function index()
	{
		return view('admin.dashboard');
	}

}