@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Form Data Kecamatan</h3>
              </div>
              <div class="panel-body">
                  @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-warning">{{ $error }}</div>
                    @endforeach
                  @endif
                  @if ($message = Session::get('error'))
                      <div class="alert alert-warning">
                          <p>{{ $message }}</p>
                      </div>
                  @endif
                  @if ($message = Session::get('success'))
                      <div class="alert alert-success">
                          <p>{{ $message }}</p>
                      </div>
                  @endif
                  {{ Form::open(array('route'=>'kecamatan.store','method'=>'post')) }}
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
                <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Daftar Data Kecamatan</h3>
              </div>
              <div class="panel-body">
                  <div class="table-responsive">
                      <table class="table table-bordered">
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th></th>
                        @foreach($itemkecamatan as $kecamatan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $kecamatan->kode }}</td>
                            <td>{{ $kecamatan->nama }}</td>
                            <td>
                                <a href="{{ route('kecamatan.edit',$kecamatan->id) }}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                                {!! Form::open(['method' => 'DELETE','route' => ['kecamatan.destroy', $kecamatan->id],'style'=>'display:inline']) !!}
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
