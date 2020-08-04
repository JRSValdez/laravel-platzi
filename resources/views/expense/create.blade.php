@extends('layouts.app')

@section('content')

    <div class="row my-4">
        <div class="col">
            <h1>New Expense: <span style="color:gray">{{$report->title}}</span> </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-6 offset-3">
            <form action="/expense_reports/{{$report->id}}/expenses" method="POST">
                @csrf
                <div class="form-group">
                    <label for="description"> Expense Description</label>
                    <input
                        type="text"
                        class="form-control"
                        id="description"
                        name="description"
                        placeholder="Expense description"
                        value="{{old('description')}}"
                    >
                </div>

                <div class="form-group">
                    <label for="title"> Expense amount</label>
                    <input
                        type="text"
                        class="form-control"
                        id="amount"
                        name="amount"
                        placeholder="Expense amount"
                        value="{{old('amount')}}"
                    >
                </div>

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                    @endforeach
                @endif

                <button class="btn btn-success" type="submit">
                    Create
                </button>

            </form>
        </div>
    </div>

    <div class="row my-4">
        <div class="col">
            <a href="/expense_reports/{{$report->id}}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
