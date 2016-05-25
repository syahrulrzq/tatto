<?php namespace App\Http\Controllers;

use App\Http\Requests;
// use Str
use App\Http\Controllers\Controller;
use App\Pemesanan;
use Validator;
use Redirect;
use Input;
use Illuminate\Http\Request;

class PemesananController extends Controller {

	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function submit()
	{
		$validator = Validator::make(Input::all(), 	[
        'nama' => 'required|max:255',
        'alamat' => 'required|max:255',
        'telp' => 'required|max:255',
        'hari' => 'required|max:255',
        // 'gambar_pesanan' => 'required|max:255',
        'pukul' => 'required|max:255',
        
    	]);

    	// if ($validator->fails()) {
     //        return redirect('pesan')
     //                  ->withErrors($validator)
     //                  ->withInput();
     //    }

		$data = new Pemesanan;
		$data->nama = Input::get('nama');
		$data->alamat = Input::get('alamat');
		$data->telepon = Input::get('telp');
		$data->hari = Input::get('hari');
		$data->pukul = Input::get('pukul');
		$data->no_pesanan = str_random(8);
		$data->status = 'pending';

		// if(Input::hasFile('gambar_pesanan')){
		// 	$gambar = date("YmdHis").uniqid().".".Input::file('gambar_pesanan')->getClientOriginalExtension();
		// 	Input::file('gambar_pesanan')->move(storage_path(),$gambar);
		// 	$data->gambar_pemesanan = $gambar;
		// }
		$base64_photo = Input::get('image');
		list($type,$base64_photo) = explode(';',$base64_photo);
        list(,$base64_photo) = explode(',',$base64_photo);
        $base64_photo = base64_decode($base64_photo);
        $image = round(microtime(true));
        file_put_contents(storage_path().'/'.$image.'.'.Input::get('mime'),$base64_photo);

        $data->gambar_pemesanan = $image.'.'.Input::get('mime');

		$data->save();

		$nomor_pesanan = Pemesanan::orderBy('id','desc')->first();
		$success = true;
		return response()->json(compact('nomor_pesanan','success'));
	}

}
