@extends('layouts.layout-dashboard')

@section('content')
    <div class="container">
        <h1>Edit Flip Materi</h1>
        <form action="{{ route('flipMateri.update', $flipMateri->uuid) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="materi_id">Materi</label>
                <select name="materi_id" id="materi_id" class="form-control">
                    @foreach ($materi as $materia)
                        <option value="{{ $materia->id }}" {{ $flipMateri->materi_id == $materia->id ? 'selected' : '' }}>{{ $materia->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control">{{ $flipMateri->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="file">File</label>
                <input type="file" name="file" id="file" class="form-control">
                @if ($flipMateri->file)
                    <p><a href="{{ $flipMateri->file }}" target="_blank">Lihat File</a></p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
