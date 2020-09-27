@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
								<div class="panel-heading">
                                    <h3 class="panel-title">Data Categories</h3>
                                    <div class="right">                                        
                                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
                                    </div>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                                                <th>No.</th>
                                                <th>Nama Categories</th>
                                                <th>Action</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach($data_categories as $c)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$c->nama_categories}}</td>
                                                <td>
                                                    <a href="categories/{{$c->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                                                    <a href="categories/{{$c->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('yakin mau dihapus')">Delete</a>
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
            <form action="/categories/create" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Categories</label>
                <input name="nama_categories" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Categories">               
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


 


