@extends('layouts.app')

@section('content')
    <main class="mb-3 container">
        <div class="row" style="font-size: 24px">
            <div class="offset-5"><strong>Balance: </strong> $ {{ $balance }}</div>
        </div>
        <div class="row">
            <div class="col-6">
                <div style="text-align: center; font-size: 28px; font-weight: bold; margin-bottom: 30px; margin-top: 30px">Most recent invoices paid</div>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Billed to</th>
                            <th>Date and Time</th>
                            <th>Amount</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    @if ($invoices->isEmpty())
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-danger" style=" color: green">No invoices have been posted</div>
                            </td>
                        </tr>
                    @endif
                    
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>
                                <a href="{{ url("/invoice/{$invoice->id}") }}">{{ $invoice->recipient }}</a>
                            </td>
                            <td>
                                <a href="{{ url("/invoice/{$invoice->id}") }}">{{ $invoice->created_at->format('Y-m-d H:i') }}</a>
                            </td>
                            <td>
                                <a href="{{ url("/invoice/{$invoice->id}") }}">$ {{ $invoice->amount }}</a>
                            </td>
                            <td>
                                <a href="{{ url("/invoice/{$invoice->id}") }}">{{ $invoice->object }}</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <a class="btn btn-success offset-3" href="{{ url("/invoices") }}">New invoice</a>
                @if ($invoices->isNotEmpty())
                    <a class="btn btn-success offset-1" href="{{ url("/invoices") }}">See all invoices</a>
                @endif
            </div>
            <div class="col-6">
                <div style="text-align: center; font-size: 28px; font-weight: bold; margin-bottom: 30px; margin-top: 30px">Most recent income</div>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Received from</th>
                            <th>Date and Time</th>
                            <th>Amount</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    @if ($incomes->isEmpty())
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-danger" style=" color: green">No income has been posted</div>
                            </td>
                        </tr>
                    @endif
                    @foreach ($incomes as $income)
                        <tr>
                            <td>
                                <a href="{{ url("/income/{$income->id}") }}">{{ $income->sender }}</a>
                            </td>
                            <td>
                                <a href="{{ url("/income/{$income->id}") }}">{{ $income->created_at->format('Y-m-d H:i') }}</a>
                            </td>
                            <td>
                                <a href="{{ url("/income/{$income->id}") }}">$ {{ $income->amount }}</a>
                            </td>
                            <td>
                                <a href="{{ url("/income/{$income->id}") }}">{{ $income->received_for }}</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <a class="btn btn-success offset-3" href="{{ url("/incomes") }}">New income</a>
                @if ($incomes->isNotEmpty())
                    <a class="btn btn-success offset-1" href="{{ url("/incomes") }}">See all income</a>
                @endif
            </div>
        </div>
    </main>
@endsection