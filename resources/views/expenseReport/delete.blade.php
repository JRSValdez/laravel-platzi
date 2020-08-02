@extends('layouts.base')

@section('content')

    <div class="row my-4">
        <div class="col">
            <h1>Confirm Delete Expense Report: <span style="color:gray">{{$report->title}}</span></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-6 offset-3">
            <form action="/expense_reports/{{$report->id}}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit">
                    Delete
                </button>

            </form>
        </div>
    </div>

    <div class="row my-4">
        <div class="col">
            <a href="/expense_reports" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
