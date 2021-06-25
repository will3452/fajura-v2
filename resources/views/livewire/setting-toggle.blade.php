<div>
    <style>
        .toggle, .toggle>* {
            box-sizing: border-box;
        }
        .toggle{
            width:30px;
            height:15px;
            border-radius: 50px;
            position: relative;
            cursor: pointer;
        }
        .toggle>div{
            width:15px;
            height:15px;
            border-radius: 50%;
            /* background: green; */
            position:absolute;
        }

        .active {
            background:#b3d5eb;
        }
        .active>div{
            right:0px;
            background:#3298DC;
        }
        .not-active{
            background:#aaa;
        }
        .not-active>div{
            left:0px;
            background:rgb(72, 72, 72);
        }


    </style>
    @if ($active)
        <div class="toggle active" wire:click="clicked()">
            <div>
            </div>
        </div>
    @else
        <div class="toggle not-active" wire:click="clicked()">
            <div>
            </div>
        </div>
    @endif
    {!! $prop == 'dark_mode' && $active ? "<link rel='stylesheet' href='/css/dark.css'/>":"" !!}
</div>
