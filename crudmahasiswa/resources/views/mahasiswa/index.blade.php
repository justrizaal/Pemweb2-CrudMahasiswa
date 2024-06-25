@extends('mahasiswa.layout')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>CRUD Mahasiswa</h2>
            </div>
            <div class="float-end">
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-success">Create New Mahasiswa</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($mahasiswa as $k => $v)
            <tr>
                <td>{{ ++$k }}</td>
                <td>{{ $v->nama }}</td>
                <td>{{ $v->kelas }}</td>
                <td>
                    <form action="{{ route('mahasiswa.destroy', $v->id) }}" method="POST">
                        <a href="{{ route('mahasiswa.show', $v->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('mahasiswa.edit', $v->id) }}" class="btn btn-primary">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection