<?php

namespace App\Http\Controllers;

use App\Mail\SummaryReport;
use App\Models\ExpenseReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ExpenseReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('expenseReport.index',[
            'reports' => ExpenseReport::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenseReport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
           'title' => 'required|min:3'
        ]);

        $report = new ExpenseReport();
        $report->title = $validData['title'];
        $report->save();

        return redirect('/expense_reports');
    }

    /**
     * Display the specified resource.
     *
     * @param ExpenseReport $expenseReport
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(ExpenseReport $expenseReport)
    {
        return view('expenseReport.show',[
            'report' => $expenseReport
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReport.edit',[
            'report' => $report
        ]);
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
        $validData = $request->validate([
            'title' => 'required|min:3'
        ],[
            'title.min' => "Title {$request['title']} is too short, minimum length is 3"
        ]);

        $report = ExpenseReport::findOrFail($id);
        $report->title = $validData['title'];
        $report->save();

        return redirect('/expense_reports');
    }

    /**
     * Show the form for confirm delete the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReport.delete',[
            'report' => $report
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = ExpenseReport::findOrFail($id);
        $report->delete();

        return redirect('/expense_reports');
    }

    /**
     * Show the view for confirmSendMail the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirmSendMail($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReport.confirmSendMail',[
            'report' => $report
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function sendMail(Request $request, $id){

        $validData = $request->validate([
            'email' => 'required|email:rfc,dns'
        ]);

        $report = ExpenseReport::findOrFail($id);

        Mail::to($validData['email'])->send(new SummaryReport($report));

        return redirect("/expense_reports/{$report->id}");
    }
}
