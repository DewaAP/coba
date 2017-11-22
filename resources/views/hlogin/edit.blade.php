@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-body">
				<legend>Input Anggaran</legend>

					<form class="" action="{{ route('home.update',$data->id) }}" method="post">
					<input type="hidden" name="_method" value="PATCH">
						{{ csrf_field() }}
						<div class="form-group {{ ($errors->has('kategori')) ? $errors->first('kategori') : '' }}">
							<label for="kategori">Kategori</label><br>
							@if ($data->kategori == "Laporan Anggaran Dinas Dalam Kota")
							<label class="radio-inline">
							<input type="radio" name="kategori" value="Laporan Anggaran Dinas Dalam Kota" checked>Laporan Anggaran Dinas Dalam Kota</label>
							<label class="radio-inline">
							<input type="radio" name="kategori" value="Laporan Anggaran Dinas Luar Kota">Laporan Anggaran Dinas Luar Kota</label>	
							@else
							<label class="radio-inline">
							<input type="radio" name="kategori" value="Laporan Anggaran Dinas Dalam Kota">Laporan Anggaran Dinas Dalam Kota</label>
							<label class="radio-inline">
							<input type="radio" name="kategori" value="Laporan Anggaran Dinas Luar Kota" checked>Laporan Anggaran Dinas Luar Kota</label>	
							@endif
							
							{!! $errors->first('kategori','<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group {{ ($errors->has('laporan')) ? $errors->first('laporan') : '' }}">
							<label for="laporan">Laporan</label>
							<input type="text" name="laporan" class="form-control" placeholder="Masukkan perihal laoran" value="{{ $data->laporan }}">
							{!! $errors->first('laporan','<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group {{ ($errors->has('biaya_konsumsi')) ? $errors->first('biaya_konsumsi') : '' }}">
							<label for="biaya_konsumsi">Biaya Konsumsi</label>
							<input type="text" name="biaya_konsumsi" class="form-control txt" placeholder="Masukkan Biaya Konsumsi" value="{{ $data->biaya_konsumsi }}">
							{!! $errors->first('biaya_konsumsi','<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group {{ ($errors->has('biaya_transport')) ? $errors->first('biaya_transport') : '' }}">
							<label for="biaya_transport">Biaya Transport</label>
							<input type="text" name="biaya_transport" class="form-control txt" placeholder="Masukkan Biaya Transport" value="{{ $data->biaya_transport }}">
							{!! $errors->first('biaya_transport','<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group {{ ($errors->has('biaya_penginapan')) ? $errors->first('biaya_penginapan') : '' }}">
							<label for="biaya_penginapan">Biaya Penginapan</label>
							<input type="text" name="biaya_penginapan" class="form-control txt" placeholder="Masukkan Biaya Penginapan" value="{{ $data->biaya_penginapan }}">
							{!! $errors->first('biaya_penginapan','<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group">
							<label for="total_biaya">Total Biaya</label>
							<span>Rp. <span id="sum">{{ $data->biaya_transport + $data->biaya_penginapan + $data->biaya_konsumsi }}</span></span>
						</div>
						<legend>Penanggung Jawab</legend>

						<div class="form-group {{ ($errors->has('nama_penanggungjawab')) ? $errors->first('nama_penanggungjawab') : '' }}">
							<label for="nama_penanggungjawab">Nama</label>
							<input type="text" name="nama_penanggungjawab" class="form-control" placeholder="Masukkan Nama" value="{{ $data->nama_penanggungjawab }}">
							{!! $errors->first('nama_penanggungjawab','<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group {{ ($errors->has('nip_penanggungjawab')) ? $errors->first('nip_penanggungjawab') : '' }}">
							<label for="nip_penanggungjawab">NIP</label>
							<input type="text" name="nip_penanggungjawab" class="form-control" placeholder="Masukkan NIP" value="{{ $data->nip_penanggungjawab }}">
							{!! $errors->first('nip_penanggungjawab','<p class="help-block">:message</p>') !!}
						</div>


						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Simpan">
						</div>

					</form>
			</div>
		</div> 
	</div>
@stop