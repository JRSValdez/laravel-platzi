@extends('layouts.base')

@section('content')

    <div class="row my-4">
        <div class="col">
            <h1>Expense Reports</h1>
        </div>
    </div>

    <div class="row my-4">
        <div class="col">
            <a href="/expense_reports/create" class="btn btn-success">New Expense Report</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-stripped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reports as $report)
                    <tr>
                        <td>{{$report->id}}</td>
                        <td>{{$report->title}}</td>
                        <td>{{$report->created_at}}</td>
                        <td>{{$report->updated_at}}</td>
                        <td>
                            <a href="/expense_reports/{{$report->id}}/edit">
                                Edit
                            </a>
                            <a href="/expense_reports/{{$report->id}}/delete" class="text-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
