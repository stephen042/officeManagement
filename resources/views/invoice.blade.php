<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <!DOCTYPE html>
    <html>

    <head>
        <style>
            #customers {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #customers td,
            #customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #customers tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            #customers tr:hover {
                background-color: #ddd;
            }

            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #04AA6D;
                color: white;
            }
        </style>
    </head>

    <body>

        <div style="text-align: center">
            <img height="100" width="100" src="../public/assets/home/logo2.jpg">
        </div>
        <hr>
        <div style="color: rgb(70, 70, 70)">
            <h3> OutPut : {{ $outputinfo->output }}</h3>
            <h4> Indicator : {{ $outputinfo->indicator }} </h4>
        </div>
        <hr>
        <table id="customers">
            <tr>
                <th>#</th>
                <th>Year</th>
                <th>Quarter</th>
                <th>Deliverable</th>
                <th>Achieved</th>
                <th>status</th>
                <th>Date</th>
            </tr>
            @forelse ($editinfo as $info => $data)
                <tr>
                    <td>{{ $info + 1 }}</td>
                    <td>{{ $data->Year }}</td>
                    <td> {{ $data->quarter }} </td>
                    <td>{{ $data->Deliverable }}</td>
                    <td>{{ $data->acheived }}</td>
                    <td>
                        @if ($data->status == 1)
                            Pending..
                        @elseif ($data->status == 2)
                            Approved
                        @endif
                    </td>
                    <td>{{ date('d M, Y / h:i a', strtotime($data->created_at)) }}</td>
                </tr>
            @empty
                <tr>

                    <td>No Data</td>
                    <td>No Data </td>
                    <td>No Data</td>
                    <td>No Data</td>
                    <td>No Data</td>
                    <td>No Data</td>
                    <td>No Data</td>
                </tr>
            @endforelse
        </table>
        <hr>
        <div style="color: rgb(59, 59, 59)">
            <h3> Target : {{ $outputinfo->target }}</h3>
            <h3> Total Achieved : {{ $sum_achieved }} </h3>
        </div>
    </body>

    </html>



</body>

</html>
