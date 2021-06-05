<div>
    <div class="table-container">
        <table class="table is-bordered is-fullwidth is-hoverable is-narrow">
            <thead>
                <tr>
                    @foreach ($title as $item)
                        <th>
                            {{ $item }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        @foreach ($key as $k)
                            <td>
                                {{ $item[$k] }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
