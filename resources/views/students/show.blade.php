@extends('layouts.main')

@section('title', 'Show Student')


@section('main_content')
    <div class="container mt-5">
        <div class="row justify-content-around">
            <div class="col-12 col-sm-8 col-md-8 col-lg-6 shadow rounded p-4">

                <h1 class="display-4">Show Student</h1>
                <form action="#" method="GET">
                    <input type="text" name="name" id="name" class="form-control input-me mt-3" placeholder="Name" value="{{ $students->name }}" required disabled>
                    <input type="text" name="student_id" id="student_id" class="form-control input-me mt-3" placeholder="Student ID" value="{{ $students->student_id_number }}" required disabled>
                    <input type="text" name="major" id="major" class="form-control input-me mt-3" placeholder="Major" value="{{ $students->major }}" required disabled>
                    <input type="email" name="email" id="email" class="form-control input-me mt-3" placeholder="Email" value="{{ $students->email }}" required disabled>
                    <input type="text" name="phone" id="phone" class="form-control input-me mt-3" placeholder="Phone" value="{{ $students->phone }}" required disabled>
                </form>
            </div>
        </div>
    </div>
@endsection