<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bridgestone Tyre Warranty Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .warranty-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            overflow: hidden;
            max-width: 600px;
            width: 100%;
        }
        .warranty-header {
            background-color: #1B4E8D;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .warranty-logo {
            height: 40px;
        }
        .warranty-company-info {
            text-align: right;
            font-size: 12px;
        }
        .warranty-content {
            padding: 20px;
        }
        .warranty-title {
            color: #1B4E8D;
            margin-top: 0;
        }
        .warranty-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .warranty-th, .warranty-td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        .warranty-th {
            font-weight: bold;
            color: #1B4E8D;
        }
        .warranty-button {
            background-color: #1B4E8D;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .warranty-button:hover {
            background-color: #ff3333;
        }
        @media (max-width: 480px) {
            .warranty-header {
                flex-direction: column;
                align-items: flex-start;
            }
            .warranty-company-info {
                text-align: left;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="warranty-card">
        <div class="warranty-header">
            <img src="bridgestone-logo.png" alt="Bridgestone" class="warranty-logo">
            <div class="warranty-company-info">
                <p>TYRE POINT</p>
                <p>1/680, Kunthippuzha, Mannarkad - 678 583</p>
                <p>Tel: 04924 224 666 / 999 56 26 469</p>
                <p>Email: mail.tyrepoint@gmail.com</p>
                <p>GSTIN: 32BHYPK4949Q1Z8</p>
            </div>
        </div>
        <div class="warranty-content">
            <h2 class="warranty-title">Warranty Information</h2>
            @foreach ($order as $value)
            
            
            <table class="warranty-table">
                <tr>
                    <th class="warranty-th">Date</th>
                    <td class="warranty-td">{{$value->date}}</td>
                </tr>
                <tr>
                    <th class="warranty-th">Customer Name</th>
                    <td class="warranty-td">{{$value->name}}</td>
                </tr>
                <tr>
                    <th class="warranty-th">Customer Mobile</th>
                    <td class="warranty-td">{{$value->telephone}}</td>
                </tr>
                <tr>
                    <th class="warranty-th">Type Of Vehicle</th>
                    <td class="warranty-td">{{$value->vehicle_type}}</td>
                </tr>
                <tr>
                    <th class="warranty-th">Vehicle Model</th>
                    <td class="warranty-td">{{$value->vehicle_model}}</td>
                </tr>
                <tr>
                    <th class="warranty-th">No Of Tyre Purchased</th>
                    <td class="warranty-td">{{$value->no_of_tyre_purchased}}</td>
                </tr>
                <tr>
                    <th class="warranty-th">KM Reading When Refilled</th>
                    <td class="warranty-td">{{$value->ODO_meter_reading}}</td>
                </tr>
            </table>
            @endforeach
            <!-- <button class="warranty-button">Send Warranty</button> -->
        </div>
    </div>
</body>
</html>