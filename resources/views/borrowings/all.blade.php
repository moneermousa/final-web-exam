@extends('layouts.main')

@section('title', 'Borrowings List')


@section('main_content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Borrowings List</h2>
        
        <a href="{{ route('borrowings.create') }}" class="btn btn-primary mb-2">
            <i class="fa-solid fa-plus me-1"></i> Add New Borrowing
        </a>
        <div class="table-responsive rounded">
            <table class="table table-hover table-bordered text-center rounded">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Book Title</th>
                        <th>Borrowed At</th>
                        <th>Returned At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- for each -->
                    @foreach ($borrowings as $borrowing)
                        <tr>
                            <td>{{ $borrowing->id }}</td>
                            <td>{{ $borrowing->student->name }}</td>
                            <td>{{ $borrowing->book->title }}</td>
                            <td>{{ $borrowing->borrowed_at }}</td>
                            <td>{{ $borrowing->returned_at }}</td>
                            
                            <td>
                                <a href="{{ route('borrowings.show', $borrowing->id) }}"><button class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-eye"></i></button></a>
                                <a href="{{ route('borrowings.edit', $borrowing->id) }}"><button class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                <form action="{{ route('borrowings.destroy', [$borrowing->id, 'page' => $borrowings->currentPage()]) }}" method="POST" style="display:inline;">
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
            {{ $borrowings->links(); }}
        </div>
    </div>
@endsection