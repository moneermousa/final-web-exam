@extends('layouts.main')

@section('title', 'Books List')


@section('main_content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Books List</h2>
        
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-2">
            <i class="fa-solid fa-plus me-1"></i> Add New Book
        </a>
        <div class="table-responsive rounded">
            <table class="table table-hover table-bordered text-center rounded">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- for each -->
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->description }}</td>
                            @if ($book->status == 'available')
                                <td><span class="badge bg-success">Available</span></td>
                            @else
                                <td><span class="badge bg-secondary">Borrowed</span></td>
                            @endif
                            <td>
                                <a href="{{ route('books.show', $book->id) }}"><button class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-eye"></i></button></a>
                                <a href="{{ route('books.edit', $book->id) }}"><button class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                <form action="{{ route('books.destroy', [$book->id, 'page' => $books->currentPage()]) }}" method="POST" style="display:inline;">
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
            {{ $books->links(); }}
        </div>
    </div>
@endsection