<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Testing;

class FormController extends Controller
{

	public function show_form(Request $request)
	{
    
		$path = public_path().'/submit_data/';

		$f = glob($path.'*');
		$count_file = 0;

		if($f != false)
		{
			$count_file = count($f);
		}

		// dd($count_file);

		return view('Form')->with('file_count',$count_file);

	}

	public function submit_form(Request $request)
	{
		$path = public_path().'/submit_data/';

		$f = glob($path.'*');
		$count_file = 0;

		if($f != false)
		{
			$count_file = count($f);
		}
		$count_file  +=1;
		// dd($count_file);

		$file=$path.'\\'.$count_file.'.json';

		$pname = $request->input('product_name');
		$quantity = $request->input('quantity');
		$price = $request->input('price');

		$total = $quantity*$price;

		$json_encoded = '[{"id":"'.$count_file.'","product_name":"'.$pname.'","quantity":"'.$quantity.'","price":"'.$price.'","total":"'.$total.'"}]';

		// $ = ["product_name"=>$pname,"quantity"=>$quantity,"price"=>$price,"total"=>$total];		

		// $array1 = array("data"=>$array);

		// $json_encoded = json_encode($array);

		// dd($file);

		// @chmod($path,0777);

		$file1 = fopen($file,"w+");

		fwrite($file1, $json_encoded);

		return "success";

	}

	public function get_datas()
	{



	}
	

}
