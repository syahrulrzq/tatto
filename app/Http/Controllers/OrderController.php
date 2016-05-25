<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Pemesanan;

class OrderController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getOrder()
	{
		return view('order');
	}

	public function checkOrder(Request $r)
	{
		$order = Pemesanan::where('no_pesanan',$r->input('no_pesanan'))->first();
		
		if (count($order)==0) {
			$success = false;
			return response()->json(compact('success'));
		}

		$success = true;
		return response()->json(compact('order','success'));
	}
}
