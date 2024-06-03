@extends('layouts.layout-dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Materi Grammar</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('materiReading.update', ['code'=> $materi->uuid]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" value="{{$materi->title}}" placeholder="Title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="deskripsi">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi" rows="3">{{$materi->description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="file">File soal</label>
                                <input type="file" name="file" class="form-control" id="file">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
