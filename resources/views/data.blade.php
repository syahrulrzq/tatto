@extends('app')
@section('content')

<script type="text/javascript">
  function showData(no_pesanan,nama,alamat,telepon,hari,pukul,gambar,status) {
    $('#nama-pesan').html(nama);
    $('#no_pesanan').html(no_pesanan);
    $('#alamat-pesan').html(alamat);
    $('#telp-pesan').html(telepon);
    $('#tanggal-pesan').html(hari);
    $('#pukul-pesan').html(pukul);
    $('#gambar-pesan').attr('src',gambar);
    $('#status').html(status);
  }
</script>

                <table aria-describedby="example2_info" role="grid" id="example2" class="table table-bordered table-hover dataTable">
                <thead>
                <tr role="row">
                    <th>No</th>
    				<th>Nama Pemesan</th>
    				<th>Nomor Telepon</th>
            <th>Nomor Pemesanan</th>
            <th>Status</th>
            <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($data as $pesanan)
                    <tr>
                      <td><?php echo $i; $i++; ?></td>
                      <td>
                          <a href="#" data-toggle="modal" data-target="#detail" style="text-decoration: none;" onclick="showData('{{ $pesanan->no_pesanan }}','{{ $pesanan->nama }}','{{ $pesanan->alamat }}','{{ $pesanan->telepon }}','{{ $pesanan->hari }}','{{ $pesanan->pukul }}','{{ url('images'.'/'.$pesanan->gambar_pemesanan) }}','{{ $pesanan->status }}')">{{$pesanan->nama}}</a>
                      </td>
                      <td>{{$pesanan->telepon}}</td>
                      <td>{{$pesanan->no_pesanan}}</td>
                      <td>
                      @if($pesanan->status=='pending')
                      PENDING
                      @else
                      @if($pesanan->status=='rejected')
                      REJECTED
                      @elseif($pesanan->status=='accepted')
                      ACCEPTED
                      @endif
                      @endif
                      </td>
                      <td>
                      <a href="/admin/pesanan/{{$pesanan->id}}/destroy" onclick="return confirm('Apakah anda yakin ingin menyetujui pesanan?')" class="btn btn-primary">Hapus</a>
                        @if($pesanan->status=='pending')
                      <a href="/admin/pesanan/{{$pesanan->id}}/reject" onclick="return confirm('Apakah anda yakin ingin menolak pesanan?')" class="btn btn-danger">Tolak</a>
                      <a href="/admin/pesanan/{{$pesanan->id}}/accept" onclick="return confirm('Apakah anda yakin ingin menyetujui pesanan?')" class="btn btn-primary">Terima</a>

                      @else
                      @endif
                      </td>
                    </tr>
                @endforeach
                </tbody>
          
              </table>

<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pesanan <span id="title-pesan"></span></h4>
      </div>
      <div class="modal-body">
        <div class="row" style="margin: auto;">
            <table class="table">
                <tr>
                    <td>Nomor Pemesanan</td>
                    <td id="no_pesanan"></td>
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
            </table>
        </div>
        <div>
          <img src="" style="max-width:100%; height:auto" id="gambar-pesan">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>  
@endsection