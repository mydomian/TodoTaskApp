@extends('layouts.master')
@push('title')
    Todos Pending Lists
@endpush
@section('content')
    <div class="row"></div>
    <div class="col-sm-12">
        <div class="card animate__animated animate__zoomIn my-3">
            <div class="card-header">
                <h3 class="card-title">Todos Lists</h3>
            </div>
            <div class="card-body">
                <div style="overflow-x:auto;">
                    <table id="todo-table" class="table table-sm table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>SL</th>
                                <th>Employe</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Due Date</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($todos as $todo)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $todo->user->name ?? '' }}</td>
                                    <td>{{ Str::words($todo->title, 6, '...') ?? '' }}</td>
                                    <td>{{ Str::words($todo->description, 6, '...') ?? '' }}</td>
                                    <td>{{ Carbon\Carbon::parse($todo->due_date_time)->format('F j, Y g:i A') ?? '' }}</td>
                                    <td>
                                        <h5>
                                            <span
                                                class="badge @if ($todo->priority == 'low') bg-danger @elseif ($todo->priority = 'medium')  bg-warning @elseif ($todo->priority = 'high') bg-success @else bg-primary @endif">
                                                {{ $todo->priority ?? '' }}
                                            </span>
                                        </h5>
                                    </td>
                                    <td>
                                        <h5>
                                            <span
                                                class="badge {{ $todo->status == 'pending' ? 'bg-danger' : 'bg-success' }}">
                                                {{ $todo->status ?? '' }}
                                            </span>
                                        </h5>
                                    </td>
                                    <td class="">
                                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-cog"></i>
                                            Menus
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('task.tatus', $todo->id) }}"
                                                onclick="return confirm('Are you sure you want to update the status?');"><i
                                                    class="fas fa-sync"></i> Update Status</a>
                                            <a class="dropdown-item" href="{{ route('tasks.show', $todo->id) }}"><i
                                                    class="fas fa-eye"></i> Show</a>
                                            @can('edit todo')
                                                <a class="dropdown-item" href="{{ route('tasks.edit', $todo->id) }}"><i
                                                    class="fas fa-pencil-alt"></i> Edit</a>
                                            @endcan
                                            @can('delete todo')
                                                <form action="{{ route('tasks.destroy', $todo->id) }}" method="POST"
                                                style="display: inline;"
                                                onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"
                                                    style="background: none; border: none; color: inherit; padding-left:15px;"><i
                                                        class="fas fa-trash-alt"></i> Delete</button>
                                            </form>
                                            @endcan

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
            $('#todo-table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
            });
            $('#todo-table_filter input').attr('placeholder', 'Search by title');
        });
    </script>
@endpush
