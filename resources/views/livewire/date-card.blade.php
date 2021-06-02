<div wire:poll>
    <style>
        .date-card , .date-card-header{
            box-sizing: border-box;
        }
        .date-card{
            width:100%;
            height:400px;
            /* border:2px solid #222; */
            border-radius: 20px;
            position: relative;
            box-shadow: 0px 4px 5px rgb(174, 174, 174);
        }
        .date-card-header{
            height:180px;
            border-radius: 20px 20px 0px 0px;
            background:url('/img/jeremy-bishop-G9i_plbfDgk-unsplash.jpg');
            background-size: cover;
            display:flex;
            align-items: center;
            justify-content: center;
        }
        .date-card-header-text{
            width:90%;
            height:100px;
            text-align: center;
        }
        .date-card-header-text-time{
            font-size:40px;
            font-weight:400;
            color: white
        }
        .date-card-header-text-date{
            color: white
        }
        .date-card-body{
            display: flex;
            width:100%;
            height:220px;
            border-radius:0px 0px 20px 20px;
            justify-content: center;
            align-items: center;
            color: #777;
        }
    </style>
    <div class="date-card">
        <div class="date-card-header">
            <div class="date-card-header-text">
                <div class="date-card-header-text-time">
                    {{ now()->format('h:i A') }}
                </div>
                <div class="date-card-header-text-date">
                    {{ now()->format('l, F j, Y')  }}
                </div>
            </div>
        </div>
        <div class="date-card-body">
            @if (auth()->user()->hasRole('dentist'))
                @if(count(auth()->user()->meetingsToday()) == 0)
                    No upcoming meetings today
                @else
                    <a href="{{route('dentist-appointments.index')}}" class="button is-rounded is-info">Show Meeting(s) Today</a>
                @endif
            @else
                @if(count(auth()->user()->appointmentsToday()) == 0)
                    No upcoming meetings today
                @else
                    <a href="{{ route('appointments.index') }}" class="button is-rounded is-info">Show Meeting Today</a>
                @endif
            @endif
        </div>
    </div>
</div>
