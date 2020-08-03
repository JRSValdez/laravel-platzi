<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseReport;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ExpenseReport $expenseReport
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(ExpenseReport $expenseReport)
    {
        return view('expense.create',[
            'report' => $expenseReport
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param ExpenseReport $expenseReport
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, ExpenseReport $expenseReport)
    {
        $validData = $request->validate([
            'description' => 'required|min:5',
            'amount' => 'required|numeric|gt:0'
        ]);

        $expense = new Expense();
        $expense->expense_report_id = $expenseReport->id;
        $expense->description = $validData['description'];
        $expense->amount = $validData['amount'];

        $expense->save();

        return redirect("/expense_reports/{$expenseReport->id}");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
