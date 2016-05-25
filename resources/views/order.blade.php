@extends('app_user')
@section('content')

<style type="text/css">
    .none{
        display: none!important;
    }
</style>
            <form id="form_check">
            <div class="form-group">
                  <label>Masukan Id Pemesanan</label>
                  <input type="text" class="form-control" id="no_pesanan" placeholder="Id Pemesanan" name="no_pesanan">
                </div> 

            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>

             <div class="row none" style="margin: auto;" id="info-message">
            <table class="table">
                <tr>
                    <td>Nomor Pemesanan</td>
                    <td id="no-pesanan"></td>
                </tr>
                <tr>
                    <td>Nama Pemesan</td>
                    <td id="nama-pesan"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td id="alamat-pesan"></td>
                </tr>
                <tr>
                    <td>No. Telepon</td>
                    <td id="telp-pesan"></td>
                </tr>
                <tr>
                    <td>Pukul</td>
                    <td id="pukul-pesan"></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td id="tanggal-pesan"></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td id="status"></td>
                </tr>
                <tr>
                    <td>Gambar Pemesanan</td>
                    <td><img src="" id="gambar"></td>
                </tr>
            </table>
        </div>
@endsection