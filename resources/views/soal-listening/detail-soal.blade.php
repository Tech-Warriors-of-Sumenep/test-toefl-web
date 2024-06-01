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
                    <h5 class="card-header">Data Soal</h5>
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
                        @foreach ($soals as $soal)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $soal->ujian->title }}
                                </td>
                                <td>
                                    {{ $soal->soal }}
                                </td>
                                <td>
                                    <audio controls>
                                        <source src="/storage/file/{{ $soal->file }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('soal-listening.edit', $soal->id) }}"><i
                                                    class="ti ti-pencil me-1"></i> Edit</a>
                                            <form action="{{ route('soal-listening.destroy', $soal->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"><i
                                                        class="ti ti-trash me-1"></i> Delete</button>
                                            </form>
                                            <a class="dropdown-item" href="{{ route('soal-listening.show', $soal->id) }}"><i
                                              class="ti ti-details me-1"></i> Details</a>
                                            <a class="dropdown-item" href="{{ route('jawaban.create', $soal->id) }}"><i
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
