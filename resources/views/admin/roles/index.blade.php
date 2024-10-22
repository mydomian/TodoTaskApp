@extends('layouts.master')
@push('title')
    Role Lists
@endpush
@section('content')
    <div class="row"></div>
    <div class="col-sm-12">
        <div class="card animate__animated animate__zoomIn my-3">
            <div class="card-header">
                <h3 class="card-title">Role Lists</h3>
            </div>
            <div class="card-body">
                <div style="overflow-x:auto;">
                    <table id="role-table" class="table table-sm table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>SL</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($roles as $role)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name ?? '' }}</td>
                                    <td class="">
                                        <button class="btn btn-info dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fas fa-cog"></i>
                                            Menus
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this item?');">
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
            $('#role-table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
            });
        });
    </script>
@endpush
