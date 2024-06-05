@extends('layouts.layout-dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Ujian Reading</h5>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('ujian-reading.update', ['code'=> $ujian->uuid]) }}" method="POST">
                        @csrf
                        @method('PUT')
                      <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{$ujian->title}}" placeholder="Ujian Hidup">
                      </div>
                      <div class="mb-3" data-select2-id="45">
                        <label for="select2Basic" class="form-label">Basic</label>
                        <div class="position-relative" data-select2-id="44">
                            <select id="select2Basic" class="select2 form-select form-select select2-hidden-accessible" data-allow-clear="true" name="category" data-select2-id="select2Basic" tabindex="-1" aria-hidden="true">
                                <option value="" disabled data-select2-id="2">
                                    Select Category
                                </option>
                                @foreach ($categories as $item)
                                <option value="{{$item->id}}" {{ ($ujian->category_id == $item->id) ? "selected" : "" }} data-select2-id="2">
                                    {{
                                        $item->name
                                    }}
                                </option>
                                @endforeach
                            </select>
                    </div>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi">{{$ujian->description}}</textarea>
                      </div>
                      <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection