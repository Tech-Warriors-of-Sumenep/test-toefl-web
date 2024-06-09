@extends('layouts.layout-dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            Soal reading
        </h4>
        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="row g-0">
                <div class="col-lg-6 p-4">
                    <h5 class="card-header">Data contoh soal</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Deskripsi</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($materi as $item)
                            <tr>
                                <td>
                                    {{ $no++ }}
                                </td>
                                <td>
                                    {{ $item->title }}
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
                                                href="{{ route('contohsoal-reading.detail-soal', ['materi' => $item->id]) }}"><i
                                                    class="ti ti-clipboard-text me-1"></i> Detail Soal</a>
                                            <a class="dropdown-item"
                                                href="{{ route('contohsoal-reading.create', ['materi' => $item->id]) }}"><i
                                                    class="ti ti-clipboard-text me-1"></i> Create Soal</a>
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
