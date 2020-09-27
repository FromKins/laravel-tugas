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
                                <form action="/articles/{{$data_article->id}}/update" method="POST" >
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image</label>
                                        <input name="avatar" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="image" placeholder="Image" value="{{$data_article->image}}">               
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="title" placeholder="Title" value="{{$data_article->title}}">               
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Release Date</label>
                                        <input name="date" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="nameHelp" placeholder="Release date" value="{{$data_article->release_date}}">               
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tags</label>
                                        <select class="form-control" name="categories[]">
                                            @foreach($data_categories as $c)
                                            <option value="{{$data_categories->id}}">{{$data_categories->nama_categories}}</option>
                                            @endforeach
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