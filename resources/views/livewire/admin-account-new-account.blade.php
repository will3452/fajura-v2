<div wire:poll>
    @if (count($unapprovedUser))
    <table class="table is-fullwidth is-bordered is-stripped is-size-7" >
        <thead>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Email
                </th>
                <th>
                    Sex
                </th>
                <th>
                    Address
                </th>
                <th>

                </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($unapprovedUser as $user)
        
                <tr x-show="!isHide" x-data="{
                    isHide:false
                }" >
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ $user->profile->sex }}
                    </td>
                    <td>
                        {{ $user->profile->address }}
                    </td>
                    <td>
                        <button class="button is-success is-small is-rounded" wire:click="approveUser({{ $user->id }})" x-on:click="isHide = true">Approve</button>
                        <button class="button is-danger is-small is-rounded" wire:click="disapproveUser({{ $user->id }})" x-on:click="isHide = true">Deny</button>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <div class="notification">
        <button class="delete" onclick="this.parentElement.remove()"></button>
        No New User!
    </div>
    @endif
</div>