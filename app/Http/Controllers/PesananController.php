<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use  App\Pemesanan;
use Illuminate\Http\Request;

class PesananController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getPesanan()
	{
		$data = Pemesanan::all();
		return view('data')->with('data', $data);
	}

		public function update_reject($id)
	{
		$pemesanan = Pemesanan::find($id);
		$pemesanan->status = "rejected";
		$pemesanan->save();
		return redirect('/admin/pesanan');
	}
		public function update_accept($id)
	{
		$pemesanan = Pemesanan::find($id);
		$pemesanan->status = "accepted";
		$pemesanan->save();
		return redirect('/admin/pesanan');
	}
		public function destroy($id){
			$pemesanan = Pemesanan::find($id);
			$pemesanan->delete();
			return redirect('/admin/pesanan');		
		}




}
 