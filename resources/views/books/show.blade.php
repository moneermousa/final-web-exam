@extends('layouts.main')

@section('title', 'Show Book')


@section('main_content')
    <div class="container mt-5">
        <div class="row justify-content-around">
            <div class="col-12 col-sm-8 col-md-8 col-lg-6 shadow rounded p-4">

                <h1 class="display-4">Show Book</h1>
                <form action="#" method="GET">
                    <input type="text" name="title" id="title" class="form-control input-me mt-3" placeholder="Book Title" value="{{ $books->title }}" disabled>
                    <input type="text" name="author" id="author" class="form-control input-me mt-3" placeholder="Author" value="{{ $books->author }}" disabled>
                    <input type="text" name="isbn" id="isbn" class="form-control input-me mt-3" placeholder="ISBN" value="{{ $books->isbn }}" disabled>
                    <input type="text" name="description" id="description" class="form-control input-me mt-3" placeholder="Description" value="{{ $books->description }}" disabled>
                </form>
            </div>
        </div>
    </div>
@endsection