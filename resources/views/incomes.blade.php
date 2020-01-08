@extends('layouts.app')
@section('chartScript')
@if ($incomes->isNotEmpty())
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    
        function drawChart() {
            
            var data = google.visualization.arrayToDataTable([
        
            ['ID', 'Amount'],
            @foreach ($incomes as $income)
                ['{{ $income->id }}', {{ $income->amount }}],
                                
            @endforeach
            ]);

            var options = {
            title: 'Income',
            legend: { position: 'bottom' },
            }

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        
    }
    </script>
    @endif
@endsection

@section('content')
    <main class="mb-3 container-fluid">
        <div class="row topRow">
        <div class="col-4 offset-3" style="font-size: 28px; font-weight: bold; margin-bottom: 30px; margin-top: 30px">Enter new income</div>
        <div class="col-3" style="font-size: 28px; font-weight: bold; margin-left: 150px; margin-bottom: 30px; margin-top: 30px">All income</div>
    </div>
    <div class="row topRow">
            <div class="col-4 offset-2">
                <form action="{{ url('/incomes/incomeNew') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="sender" class="col-sm-3 col-form-label">Received from: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="sender">
                            @error('sender')
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
                                Received from
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
                <div class="offset-7" style="color: green; font-size: 16px"><b>Total:</b> $ {{ $total_incomes }}</div>
            </div>
        </div>
        <div class="row">
            <div id="curve_chart" style="width: 900px; height: 400px"></div>

        </div>
    </main>
@endsection