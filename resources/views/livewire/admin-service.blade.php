<div>
    
    <div x-data="{
        serviceAdd:false
    }">
        <div class="mb-2" style="text-align:right;">
            <button  x-show="!serviceAdd" x-on:click="serviceAdd = true" class="button is-small is-info is-rounded">
                Add Service
            </button>
            <button x-show="serviceAdd" x-on:click="serviceAdd = false" class="button is-small is-dark is-rounded">
                Cancel
            </button>
        </div>
        
    <div x-show="serviceAdd" >
        @livewire('admin-service-create')
    </div>
    <div  x-show="!serviceAdd" >
        <div class="columns">
            <div class="column">
                @livewire('search', ['component'=>'admin-service-listing', 'placeholder'=>'Enter service name'])
            </div>
        </div>
        @livewire('admin-service-listing')
    </div>
</div>

</div>
