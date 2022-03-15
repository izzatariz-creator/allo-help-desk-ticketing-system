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
            <td>1</td>
            <td><b>Ticket Reference</b></td>
            <td>{{ $editData->ticket_ref }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td><b>Ticket Submitter</b></td>
            <td>{{ $editData['user']['name'] }}</td>
        </tr>
        <tr>
            <td>3</td>
            <td><b>Address</b></td>
            <td>{{ $editData->address }}</td>
        </tr>
        <tr>
            <td>4</td>
            <td><b>Title of Ticket</b></td>
            <td>{{ $editData->title }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td><b>Ticket Category</b></td>
            <td>{{ $editData['category']['name'] }}</td>
        </tr>
        <tr>
            <td>6</td>
            <td><b>Priority</b></td>
            <td>{{ $editData->priority }}</td>
        </tr>
        <tr>
            <td>7</td>
            <td><b>Retail Service Provider</b></td>
            <td>{{ $editData['retail_service_provider']['name'] }}</td>
        </tr>
        <tr>
            <td>8</td>
            <td><b>Modem</b></td>
            <td>{{ $editData['modem']['name'] }}</td>
        </tr>
        <tr>
            <td>9</td>
            <td><b>Router</b></td>
            <td>{{ $editData['router']['name'] }}</td>
        </tr>
        <tr>
            <td>10</td>
            <td><b>Assigned Technician</b></td>
            <td>{{ isset($editData['technician']['name']) ? $editData['technician']['name'] : ''}}</td>
            
        </tr>
        <tr>
            <td>11</td>
            <td><b>Status</b></td>
            <td>{{ $editData->status }}</td>
        </tr>
        <tr>
            <td>12</td>
            <td><b>Problem Description</b></td>
            <td>{{ $editData->description }}</td>
        </tr>

    </table>
    <br> <br>
    <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

</body>

</html>