<div>
    <div class="tabs">
        <ul>
            <li @if($activePane == 1) class="is-active" @endif><a href="#" wire:click="$set('activePane', 1)" >New Accounts</a></li>
            <li @if($activePane == 2) class="is-active" @endif><a href="#" wire:click="$set('activePane', 2)" >Patient</a></li>
            <li @if($activePane == 3) class="is-active" @endif><a href="#" wire:click="$set('activePane', 3)" >Dentist </a></li>
            <li @if($activePane == 4) class="is-active" @endif><a href="#" wire:click="$set('activePane', 4)" >Staff</a></li>
            <li @if($activePane == 5) class="is-active" @endif><a href="#" wire:click="$set('activePane', 5)" >Register</a></li>
        </ul>
    </div>
    <div wire:loading>
        <img src="/img/loading-buffering.gif" alt="" style="width:25px; height:25px;">
    </div>
    <div wire:loading.remove>
        @if ($activePane == 1)
            @livewire('admin-account-new-account')
        @endif

        @if($activePane == 2)
            @livewire('admin-account-customer')
        @endif

        @if($activePane == 3)
            @livewire('admin-account-doctor')
        @endif

        @if($activePane == 4)
            @livewire('admin-account-staff')
        @endif

        @if($activePane == 5)
           @livewire('admin-account-add-account')
        @endif
        
            
    </div>
</div>