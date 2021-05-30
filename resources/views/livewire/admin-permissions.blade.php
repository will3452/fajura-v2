<div>
    @foreach ($roles as $role)
        @livewire('admin-permission-roles', ['role'=>$role])
    @endforeach
</div>
