@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Dashboard</div>
            <div class="panel-body text-right">
              <a href="{{ route('home.create')}}" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
            </div>
          
            <!-- Table -->
            <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 150px">Tanggal</th>
                                    <th>Laporan</th>
                                    <th class="text-center">Total Biaya</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $datas as $data )
                                      <tr
                                      @if ($data->verifikasi == '1')
                                        class="success"
                                      @else
                                        class="danger"
                                      @endif>
                                          <td style="width: 150px">{{ $data->created_at }}</td>
                                          <td>{{ $data->laporan }}</td>
                                          <td class="text-center" style="width: 150px">Rp. {{ $data->biaya_transport + $data->biaya_penginapan + $data->biaya_konsumsi }}</td>
                                          <td style="width: 150px">
                                            <div class="btn-group" role="group" aria-label="...">
                                              <form class="" action="{{ route('home.destroy',$data->id)}}" method="post">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                @if ($data->verifikasi == '1')
                                                  <button type="button" class="btn btn-default"  data-toggle="modal" data-target="#myModal{{ $data->id }}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>

                                                  <a href="{{ route('home.edit', $data->id)}}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></a>

                                                  <button type="submit" onclick="return confirm('Are you sure to delete this data?');" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                                                @else
                                                  <a href="{{ route('home.show', $data->id)}}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></a>

                                                  <button type="button" class="btn btn-default"  data-toggle="modal" data-target="#myModal{{ $data->id }}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>

                                                  <a href="{{ route('home.edit', $data->id)}}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></a>                                                  
                                                @endif
                                              </form>
                                            </div>
                                          </td>
                                      </tr>
{{--  --}}
<div class="modal fade" id="myModal{{ $data->id }}" role="dialog">
  <div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">{{ $data->kategori }}</h4>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label for="name">Laporan :</label>
        <input type="text" class="form-control" id="name" value="{{ $data->laporan }}" readonly>
      </div>
      <div class="form-group">
        <label for="nip">Biaya Konsumsi :</label>
        <input type="text" class="form-control" id="nip" value="{{ $data->biaya_konsumsi }}" readonly>
      </div>
      <div class="form-group">
        <label for="ttl">Biaya Transport :</label>
        <input type="text" class="form-control" id="ttl" value="{{ $data->biaya_transport }}" readonly>
      </div>
      <div class="form-group">
        <label for="agama">Biaya Penginapan :</label>
        <input type="text" class="form-control" id="agama" value="{{ $data->biaya_penginapan }}" readonly>
      </div>
      <legend>Penanggung Jawab</legend>
      <div class="form-group">
        <label for="jk">Nama:</label>
        <input type="text" class="form-control" id="jk" value="{{ $data->nama_penanggungjawab }}" readonly>
      </div>
      <div class="form-group">
        <label for="alamat">NIP :</label>
        <input type="text" class="form-control" id="jk" value="{{ $data->nip_penanggungjawab }}" readonly>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>

  </div>
</div>
{{--  --}}
                                  @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        {{ $datas->links() }}
                    </div>
          </div>
        </div>
    </div>
</div>
@endsection