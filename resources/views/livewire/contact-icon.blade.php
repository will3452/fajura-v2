<div style="position: fixed;bottom:10px;right:10px;z-index:9999;">
    @if ($active)
    <a title="Facebook" href="{{ \App\Models\AppSetting::first()->messenger_url ?? ''}} " class="button is-small is-info is-rounded">
        <i data-feather="facebook"></i>
    </a>
    <a title="Phone" href="tel:{{ \App\Models\AppSetting::first()->phone ?? ''}} " class="button is-small is-primary is-rounded">
        <i data-feather="phone"></i>
    </a>
    <a title="Email" href="mailto:{{ \App\Models\User::where('is_admin', true)->first()->email ?? ''}} " class="button is-small is-success is-rounded">
        <i data-feather="mail"></i>
    </a>
    <script>
        feather.replace();
    </script>
    @endif
    <a href="#" class="button is-rounded is-dark is-small" wire:click="$toggle('active')">
        {{ $active ? 'Close':'Contacts' }}
    </a>
</div>