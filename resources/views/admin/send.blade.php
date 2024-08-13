<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tyre Point Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
        }

        .invoice {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .invoice-logo {
            max-width: 200px;
        }

        .invoice-company-info {
            text-align: right;
            font-size: 14px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-th,
        .invoice-td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-size: 14px;
        }

        .invoice-th {
            background-color: #f2f2f2;
        }

        .invoice-total {
            text-align: right;
            font-weight: bold;
            margin-top: 20px;
        }

        @media (max-width: 600px) {
            .invoice-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .invoice-company-info {
                text-align: left;
                margin-top: 10px;
            }

            .invoice-table,
            .invoice-tr,
            .invoice-td {
                display: block;
            }

            .invoice-th {
                display: none;
            }

            .invoice-td {
                border: none;
                position: relative;
                padding-left: 50%;
            }

            .invoice-td:before {
                content: attr(data-label);
                position: absolute;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                font-weight: bold;
            }
        }
    </style>
</head>

<body>
    <div class="invoice">
        <div class="invoice-header">
            <img src="bridgestone-" alt="Bridgestone Select" class="invoice-logo">
            <div class="invoice-company-info">
                <h2>TYRE POINT</h2>
                <p>1/680, Kunthippuzha, Mannarkad - 678 583</p>
                <p>Tel: 04924 224 666/ 999 56 26 469</p>
                <p>Email: mail.tyrepoint@gmail.com</p>
                <p>GSTIN: 32BHYPK4949Q1Z8</p>
            </div>
        </div>

        @foreach ($order as $value)
        <table class="invoice-table">
            <tr class="invoice-tr">
                <th class="invoice-th">Bill No.</th>
                <th class="invoice-th">Date</th>
                <th class="invoice-th">Customer</th>
                <th class="invoice-th">Vehicle</th>
            </tr>
            <tr class="invoice-tr">
                <td class="invoice-td" data-label="Bill No.">{{ $value->bill_no }}</td>
                <td class="invoice-td" data-label="Date">{{ $value->date }}</td>
                <td class="invoice-td" data-label="Customer">{{ $value->name }}, {{ $value->address }}, Tel: {{ $value->telephone }}</td>
                <td class="invoice-td" data-label="Vehicle">{{ $value->vehicle_model }} {{ $value->vehicle_reg }}</td>
            </tr>
        </table>

        <table class="invoice-table">
            <tr class="invoice-tr">
                <th class="invoice-th">Service</th>
                <th class="invoice-th">Rate (Before GST)</th>
                <th class="invoice-th">Count</th>
                <th class="invoice-th">Total</th>
            </tr>
            <tr class="invoice-tr">
                <td class="invoice-td" data-label="Service">Tyre Fitment</td>
                <td class="invoice-td" data-label="Rate">
                    @php
                    $tyrefitmentrate = floatval($value->tyre_fitment_total) / floatval($value->tyre_fitment_count);
                    $gst = $tyrefitmentrate / 1.18; // Assuming 18% GST
                    @endphp
                    {{ number_format($tyrefitmentrate, 2) }} (Before GST: {{ number_format($gst, 2) }})
                </td>
                <td class="invoice-td" data-label="Count">{{ $value->tyre_fitment_count }}</td>
                <td class="invoice-td" data-label="Total">
                    {{ number_format(floatval($value->tyre_fitment_total), 2) }} (Before GST: {{ number_format(floatval($value->tyre_fitment_total) / 1.18, 2) }})
                </td>
            </tr>
            <tr class="invoice-tr">
                <td class="invoice-td" data-label="Service">Wheel Balancing</td>
                <td class="invoice-td" data-label="Rate">
                    @php
                    $wheelbalancingrate = floatval($value->wheel_blancing_total) / floatval($value->wheel_blancing_count);
                    $gst = $wheelbalancingrate / 1.18; // Assuming 18% GST
                    @endphp
                    {{ number_format($wheelbalancingrate, 2) }} (Before GST: {{ number_format($gst, 2) }})
                </td>
                <td class="invoice-td" data-label="Count">{{ $value->wheel_blancing_count }}</td>
                <td class="invoice-td" data-label="Total">
                    {{ number_format(floatval($value->wheel_blancing_total), 2) }} (Before GST: {{ number_format(floatval($value->wheel_blancing_total) / 1.18, 2) }})
                </td>
            </tr>
            <tr class="invoice-tr">
                <td class="invoice-td" data-label="Service">Gram wt. used</td>
                <td class="invoice-td" data-label="Rate">
                    @php
                    $gramRate = 0;
                    if (strtolower($value->whl_a_or_o) == 'a') {
                        $gramRate = 2;
                    } elseif (strtolower($value->whl_a_or_o) == 'o') {
                        $gramRate = 0.9;
                    }
                    @endphp
                    {{ $gramRate }}
                </td>
                <td class="invoice-td" data-label="Count">{{ $value->gram_weight_used_ttl }}</td>
                <td class="invoice-td" data-label="Total">
                    {{ number_format(floatval($value->gram_weight_total), 2) }} (Before GST: {{ number_format(floatval($value->gram_weight_total) / 1.18, 2) }})
                </td>
            </tr>
            <tr class="invoice-tr">
                <td class="invoice-td" data-label="Service">Other</td>
                <td class="invoice-td" data-label="Rate">{{ number_format(floatval($value->other_total), 2) }}</td>
                <td class="invoice-td" data-label="Count">-</td>
                <td class="invoice-td" data-label="Total">
                    {{ number_format(floatval($value->other_total), 2) }} (Before GST: {{ number_format(floatval($value->other_total) / 1.18, 2) }})
                </td>
            </tr>
            <tr class="invoice-tr">
                <td class="invoice-td" data-label="Service">Alignment</td>
                <td class="invoice-td" data-label="Rate">{{ number_format(floatval($value->alingment_total), 2) }}</td>
                <td class="invoice-td" data-label="Count">-</td>
                <td class="invoice-td" data-label="Total">
                    {{ number_format(floatval($value->alingment_total), 2) }} (Before GST: {{ number_format(floatval($value->alingment_total) / 1.18, 2) }})
                </td>
            </tr>
        </table>

        <div class="invoice-total">
            <p>TOTAL: {{ number_format(floatval($value->total_inc_gst), 2) }}</p>
            <p>Less: Discount (Before GST): {{ number_format(floatval($value->total_discount_beforegst), 2) }}</p>
            <p>After Discount: {{ number_format(floatval($value->grand_total) / 1.18, 2) }}</p>
            <p>CGST (9%): {{ number_format(floatval($value->CGST_amount_recived), 2) }}</p>
            <p>SGST (9%): {{ number_format(floatval($value->SGST_amount_recived), 2) }}</p>
            <p>GRAND TOTAL: {{ number_format(floatval($value->grand_total), 2) }}</p>
        </div>
        @endforeach
    </div>
</body>

</html>
