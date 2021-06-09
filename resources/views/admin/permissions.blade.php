@extends('layouts.admin-main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Permissions</h1>
    </div>
    @livewire('admin-permissions')
@endsection

@push('styles')
    @livewireStyles()
@endpush


@push('scripts')
    @livewireScripts()
    <script src="/js/app.js" defer></script>
@endpush