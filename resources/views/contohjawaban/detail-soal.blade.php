@extends('layouts.layout-dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="pt-3 mb-0">
            <span class="text-muted fw-light">contoh Soal /</span> contoh Soal Details
        </h4>

        <div class="card g-3 mt-5 col-lg-11 mx-auto">
            <div class="card-body row g-3">
                <div class="col-lg-12 mx-auto">
                    <div class="card academy-content shadow-none border">
                        <div class="card-body">
                            <h5 class="mb-2">contoh Soal</h5>
                            <p class="mb-0 pt-1">
                                {{$soal->soal}}
                            </p>
                            <hr class="my-4">
                            <h5>Jawaban</h5>
                            <div class="d-flex flex-wrap">
                                <div class="me-5">
                                    @foreach ($soal->jawaban as $item)
                                    <p class="text-nowrap"><span class="me-2 mt-n2">{{$option[$no++]}}.</span>
                                    {{$item->name}}
                                    </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
