@extends('layouts.layout-dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Create Soal Ujian</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('soal-reading.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="soal">Soal</label>
                                <textarea id="soal" name="soal" class="form-control" placeholder="Soal Ujian"></textarea>
                                @error('soal')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <input type="hidden" name="ujian" value="{{ $ujian }}">
                            <div class="mb-3">
                                <label class="form-label" for="file">File</label>
                                <input type="file" name="file" class="form-control" id="file">
                                @error('file')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
