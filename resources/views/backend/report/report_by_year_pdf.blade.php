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
            background-color: #000000;
            color: white;
        }
    </style>
</head>

<body>


    <table id="customers">
        <tr>
            <td>
                <h2>
                    <?php $image_path = '/upload/pdf/allo.png'; ?>
                    <img src="{{ public_path() . $image_path }}" width="200" height="200">
                </h2>
            </td>
            <td>
                <h2>Allo Help Desk Ticketing System</h2>
                <p>Allo Technology Sdn. Bhd.</p>
                <p>Phone : 1-300-38-8000</p>
                <p>Email : customerservice@allo.my</p>
                <p> Report On {{ $year }}</p>

            </td>
        </tr>


    </table>



    <table id="customers">
        <tr>
            <th width="5%">No.</th>
            <th width="30%">Detail</th>
            <th>Data</th>
        </tr>
        <tr>
            <th colspan="3" style="text-align:center;">User Info</th>
        </tr>
        <tr>
            <td>1</td>
            <td><b>Num. of New Registered User</b></td>
            <td>{{ $new_registered_user }}</td>
        </tr>
        <tr>
            <th colspan="3" style="text-align:center;">Ticket Info</th>
        </tr>
        <tr>
            <td>2</td>
            <td><b>Num. of New Ticket Created</b></td>
            <td>{{ $ticket_created }}</td>
        </tr>
        <tr>
            <td>3</td>
            <td><b>Num. of Ticket Closed</b></td>
            <td>{{ $ticket_closed }}</td>
        </tr>
        <tr>
            <th colspan="3" style="text-align:center;">Ticket Per Category</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td colspan="2">{{ $category->name }}</td>
                <td>{{ $category->tickets_count }}</td>
            </tr>
        @endforeach
        <tr>
            <th colspan="3" style="text-align:center;">Ticket Per Retail Service Provider</th>
        </tr>
        @foreach ($rsps as $rsp)
        <tr>
            <td colspan="2">{{ $rsp->name }}</td>
            <td>{{ $rsp->tickets_count }}</td>
        </tr>
        @endforeach
        <tr>
            <th colspan="3" style="text-align:center;">Ticket Per Modem</th>
        </tr>
        @foreach ($modems as $modem)
        <tr>
            <td colspan="2">{{ $modem->name }}</td>
            <td>{{ $modem->tickets_count }}</td>
        </tr>
        @endforeach
        <tr>
            <th colspan="3" style="text-align:center;">Ticket Per Router</th>
        </tr>
        @foreach ($routers as $router)
        <tr>
            <td colspan="2">{{ $router->name }}</td>
            <td>{{ $router->tickets_count }}</td>
        </tr>
        @endforeach
        <tr>
            <th colspan="3" style="text-align:center;">Ticket Per Agent</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td colspan="2">{{ $user->name }}</td>
            <td>{{ $user->tickets_count }}</td>
        </tr>
        @endforeach
    </table>
    <br> <br>
    <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

</body>

</html>