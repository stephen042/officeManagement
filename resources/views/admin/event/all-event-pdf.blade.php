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
            <h3> Events </h3>
        </div>
        <hr>
        <table id="customers">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Year</th>
                    <th>Type of Event</th>
                    <th>Title of Event</th>
                    <th>Output</th>
                    <th>Location of training</th>
                    <th>Target Beneficiaries</th>
                    <th>Venue of the Training</th>
                    <th> Quarter</th>
                    <th> Expected No of Days</th>
                    <th> Actual No of Days</th>
                    <th> Start Date</th>
                    <th> End Date</th>
                    <th> Female</th>
                    <th> Male</th>
                    <th> PWD Male</th>
                    <th> PWD Female</th>
                    <th> Total</th>
                    <th> Activity Code</th>
                    <th> MoVs</th>
                    <th> Indicator Number</th>
                    <th> Indicator</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($editinfo as $info => $data)
                <tr>
                    <th>{{ $info +1 }}</th>
                    <td>{{ date("Y",strtotime($data->year)) }}</td>
                    <td>
                        {{ $data->type_of_event }}
                    </td>
                    <td>
                        {{ $data->title_of_event }}
                    </td>
                    <td>
                        {{ $data->output }}
                    </td>
                    <td>
                        {{ $data->location_of_training }}
                    </td>
                    <td>
                        {{ $data->target_bene }}
                    </td>
                    <td>
                        {{ $data->venue_of_training }}
                    </td>
                    <!-- <td>
                                              {{ $data->type_of_event }}
                                            </td> -->
                    <td>
                        {{ $data->quarter }}
                    </td>
                    <td>
                        {{ $data->expected_no_days }}
                    </td>
                    <td>
                        {{ $data->actual_no_days }}
                    </td>
                    <td>
                        {{ $data->start_date }}
                    </td>
                    <td>
                        {{ $data->end_date }}
                    </td>
                    <td>
                        {{ $data->p_female }}
                    </td>
                    <td>
                        {{ $data->p_male }}
                    </td>
                    <td>
                        {{ $data->p_pwd_male }}
                    </td>
                    <td>
                        {{ $data->p_pwd_female }}
                    </td>
                    <td>
                        {{ $data->p_total }}
                    </td>
                    <td>
                        {{ $data->activity_code }}
                    </td>
                    <td>
                        {{ $data->MoVs }}
                    </td>
                    <td>
                        {{ $data->indicator_no }}
                    </td>
                    <td>{{ $data->indicator }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>

    </html>



</body>

</html>