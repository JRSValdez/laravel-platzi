<div class="row my-4">
    <div class="col">
        <h1>Expense Report: <span style="color:gray">{{$report->title}}</span></h1>
    </div>
</div>

<div class="row">
    <div class="col-6 offset-3">
        Details
    </div>
</div>

<div class="row">
    <div class="col-6 offset-3">
        <table class="table table-stripped">
            <thead>
            <tr>
                <td>Description</td>
                <td>Amount</td>
                <td>Created at</td>
            </tr>
            </thead>

            @if(!empty($report->expenses))
                <tbody>
                @foreach($report->expenses as $expense)
                    <tr>
                        <td>{{$expense->description}}</td>
                        <td>${{$expense->amount}}</td>
                        <td>{{$expense->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            @endif

        </table>
    </div>
</div>

