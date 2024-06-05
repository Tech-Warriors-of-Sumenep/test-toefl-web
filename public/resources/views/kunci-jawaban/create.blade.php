@extends('layouts.layout-dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Create Kunci Jawaban</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('kunci-jawaban.store') }}" class="row">
                            @csrf
                            <div class="col-12 mb-md-0 mb-2">
                                <p class="">
                                    {{ $soal->soal }}
                                </p>
                            </div>
                            <input type="hidden" name="soal_id" value="{{ $soal->id }}">
                            <div class="col-md-12 mb-3">
                                <label for="defaultSelect" class="form-label">Select Answer</label>
                                <select id="defaultSelect" class="form-select" name="jawaban_id">
                                    <option>Select Answer</option>
                                    @foreach ($soal->jawaban as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $option[$no++] }}. {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-md-0 mb-2 mt-2">
                                <button type="submit" class="btn btn-secondary waves-effect waves-light">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
