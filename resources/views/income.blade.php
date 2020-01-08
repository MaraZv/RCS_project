@extends('layouts.app')

@section('content')
    <main class="mb-3">
        <div class="container">
            <table class="table">
                <tr>
                    <td style="text-align: right; padding-right: 5px">
                        Income NR:
                    </td>
                    <td>
                        {{ $income->id }}
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 5px">
                        Amount: 
                    </td>
                    <td>
                        $ {{ $income->amount }}
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 5px">
                        Description: 
                    </td>
                    <td>
                        {{ $income->received_for }}
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 5px">
                        Received form:
                    </td>
                    <td>
                        {{ $income->sender }}
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 5px">
                        Date and Time:
                    </td>
                    <td>
                        {{ $income->created_at->format('Y.m.d. H:i') }}
                    </td>
                </tr>
            </table>
        </div>
    </main>
@endsection