@extends('layouts.admin-main')

@section('content')
    <div class="card">
        <div class="card-header">
            Add New Tutorial
        </div>
        <div class="card-body">
           <form method="post" action="{{ route('admin.tutorial.update', $help) }}" x-data="{
               isText:{{ $help->type == 'text' ? 'true':'false' }},
               updateVideo(){
                   const type = document.getElementById('selectType').value;
                   this.isText = type == 'text';
                   $(function(){
                    $('#text').trumbowyg();
                   })
               }
           }">
           @csrf
           @method('PUT')
               <div class="form-group">
                   <input type="text" class="form-control" value="{{ $help->title }}"required placeholder="title eg. How to book an Appointment?" name="title">
               </div>
               <div class="form-group">
                   @php
                       $arrs = [ 'text', 'video'];
                   @endphp
                   <label for="">Type</label>
                   <select name="type" id="selectType" x-on:change="updateVideo()" required class="custom-select">
                       @foreach ($arrs as $item)
                           <option value="{{ $item }}" {{ $item == $help->type ? 'selected':'' }}>{{ $item }}</option>
                       @endforeach
                   </select>
               </div>
               <template x-if="!isText">
                <div class="form-group">
                    <input type="text" value="{{ $help->body }}" class="form-control" placeholder="Video URL eg. https://www.youtube.com/watch?v=D1YDhQ9h3As" name="body" required>
                </div>
               </template>
               <template x-if="isText">
                    <div>
                        <textarea name="body" id="text" required>{{ $help->body }}</textarea>
                    </div>
               </template>
               <div>
                <button class="btn btn-primary mt-2">
                    <i class="fa fa-save"></i>
                    Save
                </button>
                <button type="reset" class="btn btn-secondary mt-2">
                    <i class="fa fa-sync"></i>
                    Reset
                </button>
               </div>
           </form>
        </div>
    </div>
@endsection

@push('scripts')
    @include('includes.trumbowg')
    <script>
       $(function(){
        $('#text').trumbowyg();
       })
    </script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endpush
