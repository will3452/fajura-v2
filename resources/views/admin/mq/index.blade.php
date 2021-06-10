@extends('layouts.admin-main')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Questionaires</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Questions</th>
                            <th>Type</th>
                            <th>Answers</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Questions</th>
                            <th>Type</th>
                            <th>Answers</th>
                            <th>Options</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($questions as $q)
                            <tr>
                                <td>
                                {{ $q->unique_id }}
                                </td>
                                <td>
                                    {{ $q->question }}
                                </td>
                                <td>
                                    {{ $q->type }}
                                </td>
                                <td>
                                    @if ($q->type == 'multiple')
                                        <ul>
                                            @foreach ($q->i_answers as $answer)
                                                <li>
                                                    {{ $answer }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else 
                                        <p>
                                            N/a
                                        </p>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.medical.questions.destroy', $q) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>
    @livewireScripts
@endpush

@push('styles')
    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    @livewireStyles
@endpush

