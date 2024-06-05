@extends('layouts.layout-dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Create Jawaban</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('jawaban.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="soal" value="{{ $soal }}">
                            <div class="mb-3">
                                <label class="form-label" for="jawaban">Jawaban 1</label>
                                <input type="jawaban" name="jawaban[]" class="form-control" id="jawaban">
                                @error('jawaban')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="jawaban">Jawaban 2</label>
                                <input type="jawaban" name="jawaban[]" class="form-control" id="jawaban">
                                @error('jawaban')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="jawaban">Jawaban 3</label>
                                <input type="jawaban" name="jawaban[]" class="form-control" id="jawaban">
                                @error('jawaban')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="jawaban">Jawaban 4</label>
                                <input type="jawaban" name="jawaban[]" class="form-control" id="jawaban">
                                @error('jawaban')
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
