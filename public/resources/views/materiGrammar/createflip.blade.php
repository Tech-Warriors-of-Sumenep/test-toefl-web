@extends('layouts.layout-dashboard')

@section('content')
    <div class="container">
        <h1>Tambah Flip Materi</h1>
        <form action="{{ route('flipMateri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="materi_id">Materi</label>
                <select name="materi_id" id="materi_id" class="form-control">
                    @foreach ($materi as $materia)
                        <option value="{{ $materia->id }}">{{ $materia->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="file">File</label>
                <input type="file" name="file" id="file" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    </div>
@endsection
