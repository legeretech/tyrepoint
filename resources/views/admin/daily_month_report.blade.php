@extends('admin.layout')
@section('admin-body')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                            <h5 class="card-title">Daily Month Report</h5>
                        </div>
                        <div class="col-8 col-sm-8 col-md-4 col-lg-4">
                            <div class="search-bar pt-2">
                                <form class="search-form d-flex align-items-right" id="searchForm" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="date" class="form-control" id="searchDate" placeholder="Search by Date (YYYY-MM-DD)" title="Enter search date">
                                        <button type="submit" class="btn btn-primary" id="searchButton" title="Search" disabled><i class="bi bi-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div style="overflow-x: auto;">
                        <table class="table table-bordered table-striped" style="text-align:center" id="daily_month_table">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2">Month</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Bill</th>
                                    <th scope="col">Amount Received Before GST</th>
                                    <th scope="col">CGST (9%)</th>
                                    <th scope="col">SGST (9%)</th>
                                    <th scope="col">KFC</th>
                                    <th scope="col">Amount Received (incl. GST)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $currentMonth = '';
                                $currentDate = '';
                                $rowCount = 0;
                                $monthlyTotals = [
                                'amount_received_beforegst' => 0,
                                'CGST_amount_received' => 0.00,
                                'SGST_amount_received' => 0.00,
                                'KFC' => 0.00,
                                'amount_recived' => 0
                                ];
                                $grandTotals = [
                                'amount_received_beforegst' => 0,
                                'CGST_amount_received' => 0.00,
                                'SGST_amount_received' => 0.00,
                                'KFC' => 0.00,
                                'amount_recived' => 0
                                ];
                                @endphp

                                @foreach($orders as $index => $value)
                                @php
                                $orderMonth = \Carbon\Carbon::parse($value->date)->format('F Y');
                                $orderDate = \Carbon\Carbon::parse($value->date)->format('Y-m-d');

                                // Calculate CGST and SGST (assuming 9% each)
                                $cgst = (intval($value->amount_recieved_beforegst) * 9) / 100;
                                $sgst = (intval($value->amount_recieved_beforegst) * 9) / 100;

                                // Count the number of orders for the current date
                                $dateCount = $orders->where('date', $value->date)->count();

                                if ($currentMonth != $orderMonth) {
                                if ($currentMonth != '') {
                                echo '<tr style="font-weight: bold;">
                                    <td colspan="4">Total for ' . $currentMonth . '</td>
                                    <td>' . intval($monthlyTotals['amount_received_beforegst']) . '</td>
                                    <td>' . number_format($monthlyTotals['CGST_amount_received'], 2) . '</td>
                                    <td>' . number_format($monthlyTotals['SGST_amount_received'], 2) . '</td>
                                    <td>' . number_format($monthlyTotals['KFC'], 2) . '</td>
                                    <td>' . intval($monthlyTotals['amount_recived']) . '</td>
                                </tr>';

                                $monthlyTotals = [
                                'amount_received_beforegst' => 0,
                                'CGST_amount_received' => 0.00,
                                'SGST_amount_received' => 0.00,
                                'KFC' => 0.00,
                                'amount_recived' => 0
                                ];
                                }
                                $currentMonth = $orderMonth;
                                echo '<tr>
                                    <td colspan="2">' . $currentMonth . '</td>';
                                    $currentDate = '';
                                    } else {
                                    echo '
                                <tr>
                                    <td colspan="2"></td>';
                                    }

                                    // Handle row span for dates
                                    if ($currentDate != $orderDate) {
                                    $rowCount = $dateCount;
                                    $currentDate = $orderDate;
                                    echo '<td rowspan="' . $rowCount . '">' . $orderDate . '</td>';
                                    }
                                    @endphp

                                    <td>{{ $value->bill_no }}</td>
                                    <td>{{ intval($value->amount_recieved_beforegst) }}</td>
                                    <td>{{ number_format(floatval($value->CGST_amount_recived), 2) }}</td>
                                    <td>{{ number_format(floatval($value->SGST_amount_recived), 2) }}</td>
                                    <td>{{ number_format(floatval($value->KFC_frm_010819), 2) }}</td>
                                    <td>{{ intval($value->amount_recived)}}</td>
                                </tr>

                                @php
                                // Update monthly totals
                                $monthlyTotals['amount_received_beforegst'] += intval($value->amount_recieved_beforegst);
                                $monthlyTotals['CGST_amount_received'] += round(floatval($value->CGST_amount_recived), 2);
                                $monthlyTotals['SGST_amount_received'] += round(floatval($value->SGST_amount_recived), 2);
                                $monthlyTotals['KFC'] += floatval($value->KFC_frm_010819);
                                $monthlyTotals['amount_recived'] += intval($value->amount_recived);

                                // Update grand totals
                                $grandTotals['amount_received_beforegst'] += intval($value->amount_recieved_beforegst);
                                $grandTotals['CGST_amount_received'] += round(floatval($value->CGST_amount_recived), 2);
                                $grandTotals['SGST_amount_received'] += round(floatval($value->SGST_amount_recived), 2);
                                $grandTotals['KFC'] += floatval($value->KFC_frm_010819);
                                $grandTotals['amount_recived'] += intval($value->amount_recived);

                                // Decrease row count
                                $rowCount--;
                                @endphp
                                @endforeach

                                <!-- Display total for the last month if exists -->
                                @if ($currentMonth != '')
                                <tr style="font-weight: bold;">
                                    <td colspan="4">Total for {{ $currentMonth }}</td>
                                    <td>{{ intval($monthlyTotals['amount_received_beforegst']) }}</td>
                                    <td>{{ number_format($monthlyTotals['CGST_amount_received'], 2) }}</td>
                                    <td>{{ number_format($monthlyTotals['SGST_amount_received'], 2) }}</td>
                                    <td>{{ number_format($monthlyTotals['KFC'], 2) }}</td>
                                    <td>{{ intval($monthlyTotals['amount_recived']) }}</td>
                                </tr>
                                @endif
                            </tbody>
                            <tfoot id="tfoot">
                                <!-- Display grand total -->
                                <tr style="font-weight: bold;">
                                    <td colspan="4">Grand Total</td>
                                    <td>{{ intval($grandTotals['amount_received_beforegst']) }}</td>
                                    <td>{{ number_format($grandTotals['CGST_amount_received'], 2) }}</td>
                                    <td>{{ number_format($grandTotals['SGST_amount_received'], 2) }}</td>
                                    <td>{{ number_format($grandTotals['KFC'], 2) }}</td>
                                    <td>{{ intval($grandTotals['amount_recived']) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchDate').on('input', function() {
            var dateInput = $(this).val();
            var isValidDate = /^\d{4}-\d{2}-\d{2}$/.test(dateInput);

            if (isValidDate) {
                $('#searchButton').prop('disabled', false);
            } else {
                $('#searchButton').prop('disabled', true);
            }
        });

        $('#searchForm').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '/admin/daily_month_search', // Adjust URL as per your Laravel routes
                data: formData,
                success: function(response) {
                    updateTable(response);
                },
                error: function(xhr, status, error) {
                    updateError();
                }
            });
        });

        function updateTable(data) {
            var tableBody = $('#daily_month_table tbody');
            tableBody.empty();

            $.each(data, function(index, value) {
                var row = '<tr>' +
                    '<td colspan="2">' + value.month + '</td>' +
                    '<td>' + value.date + '</td>' +
                    '<td>' + value.bill_no + '</td>' +
                    '<td>' + value.amount_received_beforegst + '</td>' +
                    '<td>' + value.cgst + '</td>' +
                    '<td>' + value.sgst + '</td>' +
                    '<td>' + value.kfc + '</td>' +
                    '<td>' + value.amount_recived + '</td>' +
                    '</tr>';
                tableBody.append(row);
            });
        }

        function updateError() {
            var tableBody = $('#daily_month_table tbody');
            var tableFoot =
                tableBody.empty();
            $('#tfoot').empty();

            var errorRow = '<tr><td colspan="9">No data found</td></tr>';
            tableBody.append(errorRow);
        }
    });
</script>

@endsection