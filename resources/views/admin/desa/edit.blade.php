@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Form Edit Data Desa</h3>
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
                  {{ Form::model($itemdesa, array('route'=>array('desa.update',$itemdesa->id),'method'=>'patch')) }}
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
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                  </div>
                  {{ Form::close() }}
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
