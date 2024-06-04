@extends('layouts.layout-dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        Materi listening
    </h4>
    <!-- Hoverable Table rows -->
    <div class="card">
        <div class="row g-0">
            <div class="col-lg-6 p-4">
                <h5 class="card-header">Data Materi</h5>
            </div>
            <div class="col-lg-6 p-4" style="display: flex; height: auto; align-items: center; justify-content:end">
                <a href="{{ route('materiListening.create') }}" class="">
                    <button type="button" class="btn rounded-pill btn-success waves-effect waves-light">Create</button>
                </a>
            </div>
        </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Title</th>
              <th>Description</th>
              <th>Link File</th>
              <th>File Audio</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($materi as $materi1)
            <tr>
              <td>
                {{ $loop->iteration }}
              </td>
              <td>
                {{ $materi1->title }}
              </td>
              <td>
                {{ $materi1->description }}
              </td>
              <td>
                <a href="{{ $materi1->file }}" target="_blank">{{ $materi1->file }}</a>
            </td>
            <td>
                <audio controls>
                    <source src="{{ $materi1->file }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </td>

              <td>
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('materiListening.edit', ['code' => $materi1->uuid, 'category_id' => $materi1->category->id]) }}"><i class="ti ti-pencil me-1"></i> Edit</a>
                        <form action="{{ route('materiListening.destroy', $materi1->uuid) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item"><i class="ti ti-trash me-1"></i> Delete</button>
                        </form>
                    </div>
                </div>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!--/ Hoverable Table rows -->
</div>
@endsection
