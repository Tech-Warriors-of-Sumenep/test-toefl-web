@extends('layouts.layout-dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Input Materi listening</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('materiListening.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="deskripsi">Description</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Description" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="file">File Audio</label>
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