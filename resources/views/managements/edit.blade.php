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
                                <form action="/managements/{{$data_management->id}}/update" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image</label>
                                        <input name="avatar" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="image" placeholder="Image" value="{{$data_management->avatar}}">               
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="name" placeholder="Nama anda" value="{{$data_management->name}}">               
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{$data_management->email}}">               
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">password</label>
                                        <input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{$data_management->password}}">               
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Level</label>
                                        <select name="level" class="form-control">
                                            <option value="admin" @if($data_management->level === 'admin') selected @endif>admin</option>
                                            <option value="penulis" @if($data_management->level === 'penulis') selected @endif>penulis</option>
                                        </select>             
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
@section('content1')

        <h1>Edit data Categories</h1>
    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
    @endif
        <div class="row">
            <div class="col-lg-12">
            <form action="/managements/{{$data_management->id}}/update" method="POST">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image</label>
                                        <input name="file" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="image" placeholder="Image" value="{{$data_management->image}}">               
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Username</label>
                                        <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="username" placeholder="Username" value="{{$data_management->username}}">               
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{$data_management->email}}">               
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Level</label>
                                        <input name="level" type="option" class="form-control" id="exampleInputEmail1" aria-describedby="level" placeholder="level" value="{{$data_management->level}}">               
                                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                </form>
            </div>
        </div>
    @endsection 


