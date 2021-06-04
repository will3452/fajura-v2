<div>
    <label for="" class="label">Select Star</label>
    <a href="" wire:click.prevent="$set('star', 1)">
        <img src="{{ $star >= 1 ? '/img/star-enable.svg': '/img/star-disable.svg'}}" alt="">
    </a>
    <a href="" wire:click.prevent="$set('star', 2)">
        <img src="{{ $star >= 2 ? '/img/star-enable.svg': '/img/star-disable.svg'}}" alt="">
    </a>
    <a href="" wire:click.prevent="$set('star', 3)">
        <img src="{{ $star >= 3 ? '/img/star-enable.svg': '/img/star-disable.svg'}}" alt="">
    </a>
    <a href="" wire:click.prevent="$set('star', 4)">
        <img src="{{ $star >= 4 ? '/img/star-enable.svg': '/img/star-disable.svg'}}" alt="">
    </a>
    <a href="" wire:click.prevent="$set('star', 5)">
        <img src="{{ $star >= 5 ? '/img/star-enable.svg': '/img/star-disable.svg'}}" alt="">
    </a>
</div>
