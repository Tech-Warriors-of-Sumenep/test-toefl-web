@extends('layouts.layout-dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Contoh Soal</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('contohsoal-listening.update', $contohsoal->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="materi_id">Materi</label>
                                <select id="materi_id" name="materi_id" class="form-select">
                                    <option value="" disabled>Select Materi</option>
                                    @foreach ($materis as $materi)
                                        <option value="{{ $materi->id }}" {{ ($contohsoal->materi_id == $materi->id) ? 'selected' : '' }}>
                                            {{ $materi->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="soal">Soal</label>
                                <input type="text" name="soal" class="form-control" id="soal" value="{{ $contohsoal->soal }}" placeholder="Soal">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="file">File</label>
                                <input type="file" name="file" class="form-control" id="file" placeholder="File">
                                @if ($contohsoal->file)
                                    <p>Current file: <a href="{{ Storage::url('file/' . $contohsoal->file) }}" target="_blank">{{ $contohsoal->file }}</a></p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection