<?php

namespace app\controllers\admin;

use app\controllers\BaseController;
use app\models\Category;

class CategoriesController extends BaseController
{
	public function show()
	{
		$categories = Category::all();

		return view('admin/products/categories', compact('categories'));
	}

	public function create()
	{
		//
	}
}
