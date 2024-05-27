@extends('layouts.layout-dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            Soal Reading
        </h4>
        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="row g-0">
                <div class="col-lg-6 p-4">
                    <h5 class="card-header">Data Ujian</h5>
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
                                    {{ $no++ }}
                                </td>
                                <td>
                                    {{ $item->uuid }}
                                </td>
                                <td>
                                    {{ $item->title }}
                                </td>
                                <td>
                                    <span class="badge bg-label-info me-1">
                                        {{ $item->category->name }}
                                    </span>
                                </td>
                                <td>
                                    {{ $item->description }}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('soal-grammar.detail-soal', ['ujian' => $item->id]) }}"><i
                                                    class="ti ti-clipboard-text me-1"></i> Detail Soal</a>
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
