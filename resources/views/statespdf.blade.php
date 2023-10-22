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
            <img height="50" width="100" src="../public/assets/home/logo2.jpg">
        </div>
        <hr>
        <div style="color: rgb(70, 70, 70)">
            <h3> state : {{ ucwords($outputinfo->state) }}</h3>
        </div>
        <hr>
        <table id="customers">
            <tr>
                <th>#</th>
                <th>Output</th>
                <th>Target</th>
                <th width="30%">Indicator</th>
                <th>Year</th>
                <th>Quarter</th>
                <th>Deliverable</th>
                <th>Achieved</th>
                <th>MoVs</th>
                <th>status</th>
                <th>Date</th>
            </tr>
            @forelse ($editinfo as $info => $data)
                <tr>
                    <td>{{ $info + 1 }}</td>
                    <td>{{ $data->output }}</td>
                    <td>{{ $data->target }}</td>
                    <td>{{ $data->indicator }}</td>
                    <td>{{ $data->Year }}</td>
                    <td>{{ $data->quarter }} </td>
                    <td>{{ $data->Deliverable }}</td>
                    <td>{{ $data->acheived }}</td>
                    <td>{{ $data->MoVs }}</td>
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
    </body>

    </html>



</body>

</html>
