@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Form Data Desa</h3>
              </div>
              <div class="panel-body">
                  {{ Form::open(array('route'=>'desa.store','method'=>'post')) }}
                  <div class="form-group">
                    <label for="kecamatan_id">Kecamatan</label>
                    {{ Form::select('kecamatan_id',$itemkecamatan,null, array('class'=>'form-control')) }}
                  </div>
                  <div class="form-group">
                    <label for="kode">Kode</label>
                    {{ Form::text('kode',null, array('class'=>'form-control')) }}
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    {{ Form::text('nama',null, array('class'=>'form-control')) }}
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                  </div>
                  {{ Form::close() }}
              </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-8">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Daftar Data Desa</h3>
              </div>
              <div class="panel-body">
                  <div class="table-responsive">
                      <table class="table table-bordered">
                        <th>No</th>
                        <th>Kecamatan</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th></th>
                        @foreach($itemdesa as $desa)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $desa->kecamatan->nama }}</td>
                            <td>{{ $desa->kode }}</td>
                            <td>{{ $desa->nama }}</td>
                            <td>
                                <a href="{{ route('desa.edit',$desa->id) }}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                                {!! Form::open(['method' => 'DELETE','route' => ['desa.destroy', $desa->id],'style'=>'display:inline']) !!}
                                <button type="submit" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
                                {{ Form::close() }}
                            </td>
                        </tr>
                        @endforeach
                      </table>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
