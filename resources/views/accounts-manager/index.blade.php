@extends('layouts.main')

@section('content')
<div class="container">
    <div class="is-flex is-justify-content-space-between">
        <a href="{{ url()->previous() }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <i data-feather="arrow-left"></i>
            </div>
        </a>
    </div>

    <h2 class="title is-4" style="text-align:center">
        Patient Accounts
    </h2>

    <div class="table-container">
        <table class="table is-narrow is-bordered is-fullwidth" id="dataTable">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Sex
                    </th>
                    <th>
                        Address
                    </th>
                    <th>
                        Email / Phone
                    </th>
                    <th>
                        Job
                    </th>
                    <th>
                        Options
                    </th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Sex
                    </th>
                    <th>
                        Address
                    </th>
                    <th>
                        Email / Phone
                    </th>
                    <th>
                        Job
                    </th>
                    <th>
                        Options
                    </th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            {{ $user->unique_id }}
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->profile->sex }}
                        </td>
                        <td>
                            {{ $user->profile->address }}
                        </td>
                        <td>
                            {{ $user->email }} / {{ $user->profile->phone }}
                        </td>
                        <td>
                            {{ $user->profile->job }}
                        </td>
                        <td style="text-align:center">
                            <a href="{{ route('profile.show', $user) }}" class="button is-success is-small is-rounded">
                                <div class="icon">
                                    <i data-feather="external-link"></i>
                                </div>
                            </a>
                            <a href="{{ route('dental-records.show', $user) }}" class="button is-dark is-small is-rounded">
                                <div class="icon">
                                    <i data-feather="archive"></i>
                                </div>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="/vendor/datatables/dataTables.bootstrap4.min.css">
@endpush
@push('scripts')
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/js/demo/datatables-demo.js"></script>
@endpush