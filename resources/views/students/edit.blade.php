@extends('layouts.main')

@section('title', 'Edit Student')


@section('main_content')
    <div class="container mt-5">
        <div class="row justify-content-around">
            <div class="col-12 col-sm-8 col-md-8 col-lg-6 shadow rounded p-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <i class="fa-solid fa-xmark me-2"></i> {{ $error }} <br>
                        @endforeach
                    </div>
                @endif

                <h1 class="display-4">Edit Student</h1>
                <form action="{{ route('students.update', $students->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" id="name" class="form-control input-me mt-3" placeholder="Name" value="{{ $students->name }}" required>
                    <input type="text" name="student_id" id="student_id" class="form-control input-me mt-3" placeholder="Student ID" value="{{ $students->student_id_number }}" required>
                    <input type="text" name="major" id="major" class="form-control input-me mt-3" placeholder="Major" value="{{ $students->major }}" required>
                    <input type="email" name="email" id="email" class="form-control input-me mt-3" placeholder="Email" value="{{ $students->email }}" required>
                    <input type="text" name="phone" id="phone" class="form-control input-me mt-3" placeholder="Phone" value="{{ $students->phone }}" required>
                    <button type="submit" id="edit" class="btn btn-primary mt-3 mb-3"><i class="fa-solid fa-pen-to-square"></i> Update Student</button>
                </form>
            </div>
        </div>
    </div>
@endsection