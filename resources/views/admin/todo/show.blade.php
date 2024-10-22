@extends('layouts.master')
@push('title')
    Todo Show
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('storage/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
@push('css')
<style>
    th {
        width: 50%;
        padding: 10px;
    }
    td {
        width: 50%;
        padding: 10px;
    }
</style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12 my-3">
            <div class="card card-info animate__animated animate__zoomIn">
                <div class="card-header">
                    <h3 class="card-title">Todo Show</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table border="1" width="100%">
                                <tbody>
                                    <tr>
                                        <th>Id</th>
                                        <td>{{ $todo->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Employee</th>
                                        <td>{{ $todo->user->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $todo->title ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $todo->description ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Due Date Time</th>
                                        <td>{{ Carbon\Carbon::parse($todo->due_date_time)->format('F j, Y g:i A') ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Priority</th>
                                        <td>
                                            <span
                                                class="badge @if ($todo->priority == 'low') bg-danger @elseif ($todo->priority = 'medium')  bg-warning @elseif ($todo->priority = 'high') bg-success @else bg-primary @endif">
                                                {{ $todo->priority ?? '' }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <span
                                                class="badge {{ $todo->status == 'pending' ? 'bg-danger' : 'bg-success' }}">
                                                {{ $todo->status ?? '' }}
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('todos.index') }}" class="btn btn-info float-right"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
