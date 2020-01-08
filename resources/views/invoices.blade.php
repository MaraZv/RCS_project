@extends('layouts.app')

@section('content')
    <main class="mb-3 container-fluid">
        <div class="row topRow">
            <div class="col-4 offset-3" style="font-size: 28px; font-weight: bold; margin-bottom: 30px; margin-top: 30px">Enter new invoice</div>
            <div class="col-3" style="font-size: 28px; font-weight: bold; margin-left: 150px; margin-bottom: 30px; margin-top: 30px">All paid invoices</div>
        </div>
        <div class="row topRow">
            <div class="col-4 offset-2">
                <form action="{{ url('/invoices/invoiceNew') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="recipient" class="col-sm-3 col-form-label">Billed to: </label>
                        <div class="col-sm-8">
                            <input type="text" name="recipient" class="form-control">
                            @error('recipient')
                                <div class="alert alert-danger" style=" color: red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">Description: </label>
                        <div class="col-sm-8">
                            <input type="text" name="description" class="form-control">
                            @error('description')
                                <div class="alert alert-danger" style=" color: red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="amount" class="col-sm-3 col-form-label">Amount: </label>
                        <div class="col-sm-8">
                            <input type="text" name="amount" class="form-control">
                            @error('amount')
                                <div class="alert alert-danger" style=" color: red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success offset-6">Save</button>
                </form>
            </div>
            <div class="col-5">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>
                                Paid to
                            </th>
                            <th>
                                Date and Time
                            </th>
                            <th>
                                Amount
                            </th>
                            <th>
                                Description 
                            </th>
                            <th>
                                PDF
                            </th>
                        </tr>
                    </thead>
                    @if ($invoices->isEmpty())
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-danger" style=" color: green">No income has been posted</div>
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
                            <td>
                                <a class="btn btn-success" href="{{ url("/invoice/{$invoice->id}") }}" class="btn btn-success">Download</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="offset-7" style="color: red; font-size: 16px"><b>Total:</b> $ {{ $total_invoices }}</div>
            </div>
        </div>
    </main>
@endsection