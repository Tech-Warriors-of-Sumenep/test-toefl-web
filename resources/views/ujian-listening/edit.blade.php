@extends('layouts.layout-dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Ujian Listening</h5>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('ujian-listening.update', ['code'=> $ujian->uuid]) }}" method="POST">
                        @csrf
                        @method('PUT')
                      <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{$ujian->title}}" placeholder="Ujian Hidup">
                        @error('title')
                        <div class="form-text text-danger"> 
                          {{$message}}
                        </div>
                      @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi">{{$ujian->description}}</textarea>
                        @error('deskripsi')
                        <div class="form-text text-danger"> 
                          {{$message}}
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