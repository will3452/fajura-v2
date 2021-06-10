@extends('layouts.admin-main')

@section('content')
    <div class="card">
        <div class="card-header">
            Add new Item for Questionaire
        </div>
        <div class="card-body">
            <form action="{{ route('admin.medical.questions.store') }}" method="POST" enctype="multipart/form-data" x-data="{
                isMultiple:false,
                checkIfMultiple(){
                    let t = document.querySelector('#type');
                    this.isMultiple = t.value == 'multiple';
                }
            }">
                @csrf
                <div class="form-group">
                    <label for="">Type</label>
                    <select name="type" id="type" class="custom-select" x-on:change="checkIfMultiple()">
                        <option value="text">Text</option>
                        <option value="multiple">Multiple Choice</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Question</label>
                    <textarea name="question" class="form-control" placeholder="Aa"></textarea>
                </div>
                <template x-if.transition="isMultiple">
                    <div class="form-group">
                        <label for="">Answers</label>
                        <div class="alert alert-warning">
                            <small><strong>Format</strong> Please enter the answers seperated by '#'. eg. Answer 1#answer 2#answer 3</small>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" name="answers" required>
                        </div>
                    </div>
                </template>
                <div class="form-group">
                    <button class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Add
                    </button>
                    <button type="reset" class="btn btn-dark">
                        <i class="fa fa-sync"></i>
                        Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endpush
