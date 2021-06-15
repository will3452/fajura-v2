<div class="mb-2" x-data="{
    editable:false,
    makeObject(status, ...obj){
        return obj.map(e=>{
            return {name:e, status:status}
        })
    },
    checkAllSchedule(){
        if(this.$refs.schedule{{ $role->id }}.checked){
            document.querySelectorAll('.sched{{ $role->id }}').forEach(e=>e.checked = true);
        }else {
            document.querySelectorAll('.sched{{ $role->id }}').forEach(e=>e.checked = false)
        }
        this.updatePermission(this.makeObject(this.$refs.schedule{{ $role->id }}.checked, 'browse schedules', 'edit schedules'))

    },
    checkAllService(){
        if(this.$refs.service{{ $role->id }}.checked){
            document.querySelectorAll('.serv{{ $role->id }}').forEach(e=>e.checked = true)
        }else {
            document.querySelectorAll('.serv{{ $role->id }}').forEach(e=>e.checked = false)
        }
        this.updatePermission(this.makeObject(this.$refs.service{{ $role->id }}.checked, 'browse services', 'read services', 'edit services', 'add services', 'delete services'))
    },
    checkAllPages(){
        if(this.$refs.page{{ $role->id }}.checked){
            document.querySelectorAll('.page{{ $role->id }}').forEach(e=>e.checked = true)
        }else {
            document.querySelectorAll('.page{{ $role->id }}').forEach(e=>e.checked = false)
        }
        this.updatePermission(this.makeObject(this.$refs.page{{ $role->id }}.checked, 'browse pages', 'read pages', 'edit pages', 'add pages', 'delete pages'))
    },
    checkAllAppo(){
        if(this.$refs.appo{{ $role->id }}.checked){
            document.querySelectorAll('.appo{{ $role->id }}').forEach(e=>e.checked = true)
        }else {
            document.querySelectorAll('.appo{{ $role->id }}').forEach(e=>e.checked = false)
        }
        this.updatePermission(this.makeObject(this.$refs.appo{{ $role->id }}.checked, 'browse appointments', 'read appointments', 'edit appointments', 'add appointments', 'delete appointments'))

    },
    checkAllAcc(){
        if(this.$refs.acc{{ $role->id }}.checked){
            document.querySelectorAll('.acc{{ $role->id }}').forEach(e=>e.checked = true)
        }else {
            document.querySelectorAll('.acc{{ $role->id }}').forEach(e=>e.checked = false)
        }
        this.updatePermission(this.makeObject(this.$refs.acc{{ $role->id }}.checked, 'browse accounts', 'read accounts', 'edit accounts', 'add accounts', 'delete accounts'))
    },
    updatePermission(...data){
        data.forEach(async function(d){
            const res = await axios.post('{{ route('admin.permission.update', $role) }}', d)
            let resp = await res.data;
            console.log(resp)
        })
        
    }
    
}">
    <div class="card card-body">
        <div class="d-flex justify-content-between">
            <h5 class="title is-6">{{ strtoupper($role->name) }}</h5>
            <div>
                <button class="btn btn-success btn-sm" x-on:click="editable = true" x-show="!editable">Edit Permissions</button>
                <button class="btn btn-dark btn-sm" x-on:click="editable = false" x-show="editable">End Edit</button>
            </div>
        </div>
        <div class="block mb-2" x-show="editable">
            <div class="row">
                {{-- schedules --}}
                @if ($role->name == 'dentist')
                <div class="col">
                    <strong>
                        {{-- <input type="checkbox" x-ref="schedule{{ $role->id }}" x-on:click="checkAllSchedule"> --}}
                         Schedules
                    </strong>
                    <ul class="">
                        
                        {{-- <li>
                            <input type="checkbox" @if($role->hasPermissionTo('browse schedules')) checked @endif class="sched{{ $role->id }}" x-on:click="updatePermission({name:'browse schedules', status:$event.target.checked})"> Browse
                        </li> --}}
                        <li>
                            <input type="checkbox" @if($role->hasPermissionTo('edit schedules')) checked @endif  class="sched{{ $role->id }}" x-on:click="updatePermission({name:'edit schedules', status:$event.target.checked})"> 
                            Set day and time schedules
                        </li>
                    </ul>
                </div>
                @endif
                {{-- services --}}
                <div class="col">
                    <strong>
                        {{-- <input type="checkbox"  x-ref="service{{ $role->id }}" x-on:click="checkAllService"> --}}
                        Services
                    </strong>
                    <ul class="">
                        <li>
                            <input type="checkbox"@if($role->hasPermissionTo('browse services')) checked @endif class="serv{{ $role->id }}"  x-on:click="updatePermission({name:'browse services', status:$event.target.checked})"> 
                            Browse Services, Add Feedbacks.
                        </li>
                        {{-- <li>
                            <input type="checkbox"@if($role->hasPermissionTo('read services')) checked @endif class="serv{{ $role->id }}"  x-on:click="updatePermission({name:'read services', status:$event.target.checked})"> Read
                        </li>
                        <li>
                            <input type="checkbox"@if($role->hasPermissionTo('edit services')) checked @endif class="serv{{ $role->id }}"  x-on:click="updatePermission({name:'edit services', status:$event.target.checked})"> Edit
                        </li>
                        <li>
                            <input type="checkbox"@if($role->hasPermissionTo('add services')) checked @endif class="serv{{ $role->id }}"  x-on:click="updatePermission({name:'add services', status:$event.target.checked})"> Add
                        </li>
                        <li>
                            <input type="checkbox"@if($role->hasPermissionTo('delete services')) checked @endif class="serv{{ $role->id }}"  x-on:click="updatePermission({name:'delete services', status:$event.target.checked})"> Delete
                        </li> --}}
                    </ul>
                </div>
                {{-- pages --}}
                <div class="col">
                    <strong>
                        {{-- <input type="checkbox" x-ref="page{{ $role->id }}" x-on:click="checkAllPages"> --}}
                         Blog
                    </strong>
                    <ul class="">
                        <li>
                            <input type="checkbox" @if($role->hasPermissionTo('browse pages')) checked @endif class="page{{ $role->id }}" x-on:click="updatePermission({name:'browse pages', status:$event.target.checked})">
                            Read and Write new blog
                        </li>
                        {{-- <li>
                            <input type="checkbox" @if($role->hasPermissionTo('read pages')) checked @endif class="page{{ $role->id }}" x-on:click="updatePermission({name:'read pages', status:$event.target.checked})"> Read
                        </li>
                        <li>
                            <input type="checkbox" @if($role->hasPermissionTo('edit pages')) checked @endif class="page{{ $role->id }}" x-on:click="updatePermission({name:'edit pages', status:$event.target.checked})"> Edit
                        </li>
                        <li>
                            <input type="checkbox" @if($role->hasPermissionTo('add pages')) checked @endif class="page{{ $role->id }}" x-on:click="updatePermission({name:'add pages', status:$event.target.checked})"> Add
                        </li>
                        <li>
                            <input type="checkbox" @if($role->hasPermissionTo('delete pages')) checked @endif class="page{{ $role->id }}" x-on:click="updatePermission({name:'delete pages', status:$event.target.checked})"> Delete
                        </li> --}}
                    </ul>
                </div>
                {{-- appointments --}}
                <div class="col">
                    <strong>
                        {{-- <input type="checkbox" x-ref="appo{{ $role->id }}" x-on:click="checkAllAppo"> --}}
                        Appointments
                    </strong>
                    <ul class="">
                        @if ($role->name == 'staff')
                            <li>
                                <input type="checkbox" @if($role->hasPermissionTo('browse appointments')) checked @endif class="appo{{ $role->id }}" x-on:click="updatePermission({name:'browse appointments', status:$event.target.checked})">
                                Browse All Appointment
                            </li>
                        @endif
                        {{-- 
                        <li>
                            <input type="checkbox"  @if($role->hasPermissionTo('read appointments')) checked @endif class="appo{{ $role->id }}" x-on:click="updatePermission({name:'read appointments', status:$event.target.checked})"> Read
                        </li> --}}
                        @if ($role->name == 'dentist')
                            <li>
                                <input type="checkbox" @if($role->hasPermissionTo('edit appointments')) checked @endif class="appo{{ $role->id }}" x-on:click="updatePermission({name:'edit appointments', status:$event.target.checked})"> Approve or Decline Appointment
                            </li>
                        @endif
                        @if ($role->name == 'patient')
                            <li>
                                <input type="checkbox" @if($role->hasPermissionTo('add appointments')) checked @endif class="appo{{ $role->id }}" x-on:click="updatePermission({name:'add appointments', status:$event.target.checked})"> Book an Appointment
                            </li>
                        @endif
                        {{-- <li>
                            <input type="checkbox" @if($role->hasPermissionTo('delete appointments')) checked @endif class="appo{{ $role->id }}" x-on:click="updatePermission({name:'delete appointments', status:$event.target.checked})"> Delete
                        </li> --}}
                    </ul>
                </div>
                {{-- account manament --}}
                @if ($role->name == 'staff')
                <div class="col">
                    <strong>
                        {{-- <input type="checkbox" x-ref="acc{{ $role->id }}" x-on:click="checkAllAcc"> --}}
                        Accounts
                    </strong>
                    <ul class="">
                        {{-- <li>
                            <input type="checkbox" class="acc{{ $role->id }}" @if($role->hasPermissionTo('browse accounts')) checked @endif x-on:click="updatePermission({name:'browse accounts', status:$event.target.checked})"> Browse
                        </li> --}}
                        <li>
                            <input type="checkbox" class="acc{{ $role->id }}" @if($role->hasPermissionTo('read accounts')) checked @endif x-on:click="updatePermission({name:'read accounts', status:$event.target.checked})"> View all Accounts
                        </li>
                        {{-- <li>
                            <input type="checkbox" class="acc{{ $role->id }}" @if($role->hasPermissionTo('edit accounts')) checked @endif x-on:click="updatePermission({name:'edit accounts', status:$event.target.checked})"> Edit
                        </li>
                        <li>
                            <input type="checkbox" class="acc{{ $role->id }}" @if($role->hasPermissionTo('add accounts')) checked @endif x-on:click="updatePermission({name:'add accounts', status:$event.target.checked})"> Add
                        </li>
                        <li>
                            <input type="checkbox" class="acc{{ $role->id }}" @if($role->hasPermissionTo('delete accounts')) checked @endif x-on:click="updatePermission({name:'delete accounts', status:$event.target.checked})"> Delete
                        </li> --}}
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
    
</div>