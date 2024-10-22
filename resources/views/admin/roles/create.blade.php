@extends('layouts.master')
@push('title')
    Roles Create
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12 my-3">

            <form action="{{ route('roles.store') }}" method="post">
                @csrf
                <div class="card card-info animate__animated animate__zoomIn">
                    <div class="card-header">
                        <h3 class="card-title">Roles Create</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Role Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" placeholder="Enter Role Name" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Select Single/Multiple Employee <span class="text-danger">*</span></label>
                                    <select multiple name="users[]" class="form-control" required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Permissions <span class="text-danger">*</span></label>
                                    @foreach ($permissions as $permission)
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="permissions[]" type="checkbox"
                                                id="customCheckbox{{ $permission->id }}" value="{{ $permission->name }}">
                                            <label for="customCheckbox{{ $permission->id }}"
                                                class="custom-control-label">{{ $permission->name }}</label>
                                        </div>
                                    @endforeach

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
