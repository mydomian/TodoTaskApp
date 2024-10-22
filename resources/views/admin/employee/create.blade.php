@extends('layouts.master')
@push('title')
    Employee Create
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
            <form action="{{ route('employees.store') }}" method="post">
                @csrf
                <div class="card card-info animate__animated animate__zoomIn">
                    <div class="card-header">
                        <h3 class="card-title">Employee Create</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" placeholder="Enter Employee Name" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" placeholder="Enter Employee Email" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Address (optional)</label>
                                    <input type="text" name="address" placeholder="Enter Employee Address" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Phone (optional)</label>
                                    <input type="text" name="phone" placeholder="Enter Employee Phone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" placeholder="Enter Employee Password" class="form-control" required>
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
