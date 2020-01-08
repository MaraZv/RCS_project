<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoice;
use App\Income;
use App\User;
use App\Http\Requests\InvoiceRequest;

use PDF;

class InvoiceController extends Controller
{
    public function invoice(Invoice $invoice, User $user) {
        $user = \Auth::user();
        $total_invoices = $user->invoices()->get()->sum('amount');
        
        $invoices = $user->invoices()->paginate(15);
        
        return view('invoices', [
            'total_invoices' => $total_invoices,
            'invoices' => $invoices
        ]);
    }

    public function single(Invoice $invoice) {        
        return view('invoice', [
            'invoice' => $invoice,
        ]);
    }

    // PDF generation
    public function pdftest(Invoice $invoice) {
        // return view('documents.invoicePDF', [
        //     'invoice' => $invoice
        // ]);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('documents.invoicePDF', [
            'invoice' => $invoice
        ]);
        return $pdf->download('invoice.pdf');
    }

    

    public function submit(Invoice $invoice, InvoiceRequest $request) {
        $invoice = new Invoice();   
        $user = \Auth::user();

        $invoice->recipient = $request->input('recipient');
        $invoice->object = $request->input('description');
        $invoice->amount = $request->input('amount');

        $user->invoices()->save($invoice);

        return back();
    }

    public function dashData(User $user) {
        $user = \Auth::user();

        $total_incomes = Income::all()->where('user_id', $user->id)->sum('amount');
        $total_invoices = Invoice::all()->where('user_id', $user->id)->sum('amount');

        $balance = $total_incomes - $total_invoices;
        
        return view('dashboard', [
            'invoices' => $user->invoices()->paginate(5),
            'incomes' => $user->incomes()->paginate(5),
            'balance'=> $balance,
        ]);
    }

}
 