@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
								<div class="panel-heading">
                                    <h3 class="panel-title">Data Article</h3>
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
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Release date</th>
                                                <th>Tags</th>
                                                <th>Action</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach($data_article as $a)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><img src="{{url('/image/'.$a->image)}}" width="100"></td>
                                                <td>{{$a->title}}</td>
                                                <td>{{$a->description}}</td>
                                                <td>{{$a->release_date}}</td>
                                                <td>{{$a->tags}}</td>
                                                <td>
                                                    <a href="articles/{{$a->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                                                    <a href="articles/{{$a->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('yakin mau dihapus')">Delete</a>
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
            <form action="/articles/create" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">Image</label>
                <input name="avatar" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="image" placeholder="Image">               
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="title" placeholder="Title">               
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input name="description" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="description" placeholder="Description">               
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Release date</label>
                <input name="date" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="nameHelp" placeholder="Release date">               
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tags</label>
                <select class="form-control" name="categories[]">
                    @foreach($data_categories as $c)
                    <option value="{{$c->id}}">{{$c->nama_categories}}</option>
                    @endforeach
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


 


