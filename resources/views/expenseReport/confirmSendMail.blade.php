@extends('layouts.base')

@section('content')

    <div class="row my-4">
        <div class="col">
            <h1>Send Expense Report: <span style="color:gray">{{$report->title}}</span> </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-6 offset-3">
            <form action="/expense_reports/{{$report->id}}/sendMail" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email"> Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com">
                </div>

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                    @endforeach
                @endif

                <button class="btn btn-success" type="submit">
                    Send
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
