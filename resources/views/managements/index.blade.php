@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
								<div class="panel-heading">
                                    <h3 class="panel-title">Data User Management</h3>
                                    <div class="right">                                        
                                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
                                    </div>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Level</th>
                                                <th>Action</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach($data_management as $m)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><img src="{{url('/image/'.$m->image)}}" width="100"></td>
                                                <td>{{$m->name}}</td>
                                                <td>{{$m->email}}</td>
                                                <td>{{$m->level}}</td>
                                                <td>
                                                    <a href="managements/{{$m->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                                                    <a href="managements/{{$m->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('yakin mau dihapus')">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
										</tbody>
									</table>
								</div>
							</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="/managements/create" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">Image</label>
                <input name="avatar" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="image" placeholder="Image">               
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="name" placeholder="Nama anda">               
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">               
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="password" placeholder="Password">               
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">level</label>
                <select name="level" class="form-control">
                    <option value="admin">admin</option>
                    <option value="penulis">penulis</option>
                </select>
           </div>
                          
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
@stop


 


