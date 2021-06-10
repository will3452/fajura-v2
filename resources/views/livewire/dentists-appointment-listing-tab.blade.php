<div class="tabs is-centered">
    <ul>
      <li
      wire:click="changeSelected(1)"
      @if ($selected == 1)
      class="is-active"
      @endif
      ><a>All</a></li>
      <li
      wire:click="changeSelected(2)"
      @if ($selected == 2)
      class="is-active"
      @endif
      ><a>Today</a></li>
      <li
      wire:click="changeSelected(3)"
      @if ($selected == 3)
      class="is-active"
      @endif
      ><a>Completed</a></li>
      <li
      wire:click="changeSelected(4)"
      @if ($selected == 4)
      class="is-active"
      @endif
      ><a>Incoming</a></li>
      <li
      wire:click="changeSelected(5)"
      @if ($selected == 5)
      class="is-active"
      @endif
      ><a>Cancelled</a></li>
    </ul>
  </div>