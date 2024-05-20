@extends('layouts.layout-dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">         
    <h4 class="py-3 mb-4">
        Ujian Grammer
    </h4>
    <!-- Hoverable Table rows -->
    <div class="card">
        <div class="row g-0">
            <div class="col-lg-6 p-4">
                <h5 class="card-header">Data Ujian Grammer</h5>
            </div>
            <div class="col-lg-6 p-4" style="display: flex; height: auto; align-items: center; justify-content:end">
                <a href="{{ route('ujian-grammar.create') }}" class="">
                    <button type="button" class="btn rounded-pill btn-success waves-effect waves-light">Create</button>
                </a>
            </div>
        </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Kode Ujian</th>
              <th>Title</th>
              <th>Kategori</th>
              <th>Deskripsi</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">     
            @foreach ($ujian as $item)
            <tr>
              <td>
                {{$no++}}
              </td>
              <td>
                {{$item->uuid}}
              </td>
              <td>
                {{
                  $item->title
                }}
              </td>
              <td>
                <span class="badge bg-label-info me-1">
                  {{
                    $item->category->name
                  }}
                </span>
              </td>
              <td>
                {{$item->description}}
              </td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('ujian-grammar.edit', ['code'=> $item->uuid]) }}"><i class="ti ti-pencil me-1"></i> Edit</a>
                    <form action="{{ route('ujian-grammar.destroy', ['code'=> $item->uuid]) }}" method="POST">
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