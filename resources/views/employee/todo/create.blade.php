@extends('layouts.master')
@push('title')
    Todo Create
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('storage/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12 my-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('tasks.store') }}" method="post">
                @csrf
                <div class="card card-info animate__animated animate__zoomIn">
                    <div class="card-header">
                        <h3 class="card-title">Todo Create</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Assign Task <span class="text-danger">*</span></label>
                                    <select name="user_id" class="form-control select2bs4" style="width: 100%;" required>
                                        <option value="">Select Employee</option>
                                        @foreach ($users as $user)
                                             <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" placeholder="Enter your title" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Due Date Time <span class="text-danger">*</span></label>
                                    <input type="datetime-local" name="due_date_time" placeholder="Enter your due date time"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Priority (optional)</label>
                                    <select name="priority" class="form-control">
                                        <option value="">Select Priority</option>
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Description <span class="text-danger">*</span></label>
                                    <textarea name="description" placeholder="Enter your description" class="form-control" id=""></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('storage/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
            $('#todo-table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
            });
        });
    </script>
@endpush
