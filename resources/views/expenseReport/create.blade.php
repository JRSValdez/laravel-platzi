@extends('layouts.base')

@section('content')

    <div class="row my-4">
        <div class="col">
            <h1>New Expense Reports</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-6 offset-3">
            <form action="/expense_reports" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title"> Report Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Report Title">
                </div>
                <button class="btn btn-success" type="submit">
                    Create
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
