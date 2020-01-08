@extends('layouts.app')

@section('content')
    <main class="mb-3">
        <div class="container" id="singleInvoice">
            <table class="table">
                <tr>
                    <td style="text-align: right; padding-right: 5px">
                        Invoice NR:
                    </td>
                    <td>
                        {{ $invoice->id }}
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 5px">
                        Amount: 
                    </td>
                    <td>
                        $ {{ $invoice->amount }}
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 5px">
                        Description: 
                    </td>
                    <td>
                        {{ $invoice->object }}
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 5px">
                        Billed to:
                    </td>
                    <td>
                        {{ $invoice->recipient }}
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 5px">
                        Date and Time:
                    </td>
                    <td>
                        {{ $invoice->created_at->format('Y.m.d. H:i') }}
                    </td>
                </tr>
            </table>
        </div>

        <a href="{{ url("/invoice/{$invoice->id}/generatePDF") }}" type="submit" class="btn btn-success" style="margin-top: 16px; margin-left: 850px">Download PDF</a>
        <!-- Download PDF -->
    </main>
@endsection