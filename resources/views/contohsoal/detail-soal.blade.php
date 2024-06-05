@extends('layouts.layout-dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            Soal
        </h4>
        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="row g-0">
                <div class="col-lg-6 p-4">
                    <h5 class="card-header">Data contoh Soal</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Ujian</th>
                            <th>Soal</th>
                            <th>File</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($contohsoals as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $item->materi->title }}
                                </td>
                                <td>
                                    {{ $item->soal}}
                                </td>
                                <td>
                                    <audio controls>
                                        <source src="/storage/file/{{ $item->file }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('soal-listening.edit', $item->id) }}"><i
                                                    class="ti ti-pencil me-1"></i> Edit</a>
                                            <form action="{{ route('soal-listening.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"><i
                                                        class="ti ti-trash me-1"></i> Delete</button>
                                            </form>
                                            <a class="dropdown-item" href="{{ route('contohsoal-listening.show', $item->id) }}"><i
                                              class="ti ti-details me-1"></i> Details</a>
                                            <a class="dropdown-item" href="{{ route('contohjawaban.create', $item->id) }}"><i
                                              class="ti ti-abc me-1"></i> Create Jawaban</a>
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
