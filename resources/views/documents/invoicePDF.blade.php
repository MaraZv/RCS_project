<style>
    table {
        margin: 0 auto;
        padding-top: 100px;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        border-collapse: collapse;
    }
    .col-1 {
        text-align: right;
    }
    .col-2 {
        padding-left: 20px;
    }
    .col-1, .col-2 {
        
        border: 1px solid black;
        padding: 5px 20px;
        border-collapse: collapse;
        
    }
    small {
        padding: 0;
        margin: 0;
    }


</style>
<title>Invoice</title>
<body>
    
    <h1>Invoice</h1>

    <h4>From: {{$invoice->user->name}}</h4>

    <div>
        <table>
            <tr>
                <td class="col-1" style="font-weight: bold">
                    Billed to:
                </td>
                <td class="col-2" style="font-weight: bold">
                    {{ $invoice->recipient }}
                </td>
            </tr>
            <tr>
                <td class="col-1">
                    Invoice NR:
                </td>
                <td class="col-2">
                    {{ $invoice->id }}
                </td>
            </tr>
            <tr>
                <td class="col-1">
                    Amount: 
                </td>
                <td class="col-2">
                    $ {{ $invoice->amount }}
                </td>
            </tr>
            <tr>
                <td class="col-1">
                    Description: 
                </td>
                <td class="col-2">
                    {{ $invoice->object }}
                </td>
            </tr>
            
            <tr>
                <td class="col-1">
                    Date and Time:
                </td>
                <td class="col-2">
                    {{ $invoice->created_at->format('Y.m.d. H:i') }}
                </td>
            </tr>
        </table>
    </div>
</body>