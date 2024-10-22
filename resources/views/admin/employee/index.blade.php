@extends('layouts.master')
@push('title')
    Employees Lists
@endpush
@section('content')
    <div class="row"></div>
    <div class="col-sm-12">
        <div class="card animate__animated animate__zoomIn my-3">
            <div class="card-header">
                <h3 class="card-title">Employees Lists</h3>
            </div>
            <div class="card-body">
                <div style="overflow-x:auto;">
                    <table id="employee-table" class="table table-sm table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Access Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($employees as $employee)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $employee->name ?? '' }}</td>
                                    <td>{{ $employee->email ?? '' }}</td>
                                    <td>{{ $employee->phone ?? '' }}</td>
                                    <td>{{ Str::words($employee->address, 6, '...') ?? '' }}</td>
                                    <td>{{ $employee->access_code ?? '' }}</td>
                                    <td class="">
                                        <button class="btn btn-info dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fas fa-cog"></i>
                                            Menus
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('employees.show',$employee->id) }}"><i class="fas fa-eye"></i> Show</a>
                                            <a class="dropdown-item" href="{{ route('employees.edit',$employee->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item" style="background: none; border: none; color: inherit; padding-left:15px;"><i class="fas fa-trash-alt"></i> Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#employee-table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
            });
        });
    </script>
@endpush
