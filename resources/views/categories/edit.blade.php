@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Inputs</h3>
								</div>
								<div class="panel-body">
                                <form action="/categories/{{$data_categories->id}}/update" method="POST">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Categories</label>
                                        <input name="nama_categories" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Categories" value="{{$data_categories->nama_categories}}">               
                                    </div>
                                    <button type="submit" class="btn btn-warning">Update</button>
                                </form>
								</div>
							</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
<!-- @section('content1')

        <h1>Edit data Categories</h1>
    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
    @endif
        <div class="row">
            <div class="col-lg-12">
                <form action="/categories/{{$data_categories->id}}/update" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Categories</label>
                        <input name="nama_categories" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Categories" value="{{$data_categories->nama_categories}}">               
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    @endsection  -->


