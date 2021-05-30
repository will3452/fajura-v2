<div>
    <table class="table is-bordered table-striped is-fullwidth is-size-7">
        <thead>
            <tr>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>SEX</th>
                <th>ADDRESS</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staff as $user)
                <tr>
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
                        <a href="#" class="button is-small is-success is-rounded">view</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
