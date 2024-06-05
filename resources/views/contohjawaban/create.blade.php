@extends('layouts.layout-dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Create jawaban contoh soal</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('contohjawaban.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="soal" value="{{ $contohsoal }}">
                            <div class="mb-3">
                                <label class="form-label" for="jawabancontohsoal">jawaban contoh soal 1</label>
                                <input type="jawabancontohsoal" name="jawabancontohsoal[]" class="form-control" id="jawabancontohsoal">
                                @error('jawabancontohsoal')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="jawabancontohsoal">jawaban contoh soal 2</label>
                                <input type="jawabancontohsoal" name="jawabancontohsoal[]" class="form-control" id="jawabancontohsoal">
                                @error('jawabancontohsoal')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="jawabancontohsoal">jawaban contoh soal 3</label>
                                <input type="jawabancontohsoal" name="jawabancontohsoal[]" class="form-control" id="jawabancontohsoal">
                                @error('jawabancontohsoal')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="jawabancontohsoal">jawaban contoh soal 4</label>
                                <input type="jawabancontohsoal" name="jawabancontohsoal[]" class="form-control" id="jawabancontohsoal">
                                @error('jawabancontohsoal')
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
