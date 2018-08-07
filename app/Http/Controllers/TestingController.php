<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Testing;

class TestingController extends Controller
{

	public function testing_add(Request $request)
	{
    
		
		$testing = new Testing();
		$testing->name = "Ajay";
		$testing->save();

		
		return "done";

	}

	
	

}
