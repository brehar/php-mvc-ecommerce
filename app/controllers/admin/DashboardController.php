<?php

namespace app\controllers\admin;

use app\controllers\BaseController;

class DashboardController extends BaseController
{
	public function show()
	{
		return view('admin/dashboard');
	}
}
