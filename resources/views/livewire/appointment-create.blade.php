<form action="{{ route('appointments.store') }}" x-data="{}" method="POST">
    @csrf
    <div class="field">
        <label for="" class="label">
            Choose your Dentist
        </label>
        <div class="control">
            <div class="select is-fullwidth">
                <select name="dentist_id" id="" wire:model="dentist">
                    @foreach ($dentists as $dentist)
                        <option value="{{ $dentist->id }}">{{ $dentist->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    @if ($dentist != '')
    <script src="https://unpkg.com/js-datepicker"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="field">
        <label for="">Choose Date</label>
        <div class="control">
            <input type="text" id="appDate"  name="date" class="input" required>
        </div>
    </div>
    <script>
        const picker = datepicker('#appDate',
        {
            formatter: (input, date, instance) => {
                const value = moment(date).format('YYYY/MM/DD')
                input.value = value // => '1/1/2099'
            },
            minDate:new Date(moment().add(1, 'days').format('YYYY-MM-DD')),
            maxDate:new Date(moment().add(4, 'months').format()),
            startDate:new Date(moment().add(3, 'days').format('YYYY-MM-DD')),
            disabler: date => {
                let aDates = [
                    @foreach ($this->days as $day)
                        {{ $day }},
                    @endforeach
                ];
                let dates = [0,1,2,3,4,5,6].filter(e=>!aDates.includes(e));
                return dates.includes(date.getDay());
            }
        });
    </script>
    @endif
    <button class="button is-small is-success is-rounded">Check Availability</button>
</form>
