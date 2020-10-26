@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="/"> Back</a>
            </div>
        </div>
    </div>

    <form method="POST" action="/movie/{{ $movie->id }}/">
        @method ('PATCH')
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <label>
                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $movie->title }}">
                    </label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <label>
                        <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $movie->description }}</textarea>
                    </label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Genre:</strong>
                    <label>
                        <textarea class="form-control" style="height:150px" name="genre" placeholder="Genre">{{ $movie->genre }}</textarea>
                    </label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection