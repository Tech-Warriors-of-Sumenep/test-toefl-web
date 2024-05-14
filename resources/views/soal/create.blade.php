@extends('layouts.layout-dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Create Soal</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('soal.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="ujian_id">Ujian</label>
                                <select id="ujian_id" name="ujian_id" class="form-select">
                                    <option value="" selected disabled>Select Ujian</option>
                                    @foreach ($ujians as $ujian)
                                        <option value="{{ $ujian->id }}">{{ $ujian->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="soal">Soal</label>
                                <input type="text" name="soal" class="form-control" id="soal" placeholder="Soal">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="file">File</label>
                                <input type="file" name="file" class="form-control" id="file" placeholder="File">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
