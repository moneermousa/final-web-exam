@extends('layouts.main')

@section('title', 'Students List')


@section('main_content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Students List</h2>
        
        <a href="{{ route('students.create') }}" class="btn btn-primary mb-2">
            <i class="fa-solid fa-plus me-1"></i> Add New Student
        </a>
        <div class="table-responsive rounded">
            <table class="table table-hover table-bordered text-center rounded">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>Student No.</th>
                        <th>Major</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- for each -->
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->student_id_number }}</td>
                            <td>{{ $student->major }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>
                                <a href="{{ route('students.show', $student->id) }}"><button class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-eye"></i></button></a>
                                <a href="{{ route('students.edit', $student->id) }}"><button class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                <form action="{{ route('students.destroy', [$student->id, 'page' => $students->currentPage()]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="delete" onclick="return confirm('Are You Sure?')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {{ $students->links(); }}
        </div>
    </div>
@endsection