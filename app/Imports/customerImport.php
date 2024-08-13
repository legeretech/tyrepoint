<?php

namespace App\Imports;

use App\Models\Customer;
use App\Models\Order;
use App\Models\vehicle_info;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class CustomerImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $shop_id = auth()->user()->role_id;
        $registration_no = Customer::where('registration_no', $row['Registration No.'])->pluck('registration_no');

        // Check if the telephone number exists in the collection
        if (!$registration_no->contains($row['Registration No.'])) {
            $customer = Customer::updateOrCreate(
                [
                    'telephone' => $row['Telephone'] ?? "",
                ],
                [
                    'name' => $row['Name'] ?? "",
                    'address' => $row['Address'] ?? "",
                    'registration_no' => strtoupper($row['Registration No.'] ?? ""),
                    'role_id' => 3,
                    'shop_id' => $shop_id ?? "",
                ]
            );
            $vehicle_info = vehicle_info::updateOrCreate(
                ['registration_no' => strtoupper($row['Registration No.'] ?? "")],
                [
                    'vehicle_model' => $row['Vehicle ID'] ?? "",
                    'vehicle_type' => $row['Vehicle'] ?? 'car',
                    'vehicle_name' => $row['Vehicle ID'] ?? "",
                    'ODO_meter_reading' => $row['ODO Metre Reading (KM)'] ?? "",
                    'previous_align' => $row['Previous Align (KM)'] ?? "",
                    'KM_after_previous_align' => $row['KM Run after Prev. Align'] ?? "",
                    'average_run_per_day' => $row['Avrge. run/ day'] ?? "",
                ]
            );
        }

        if (isset($customer)) {
            $customerId = $customer->id;
        } else {
            // Handle the case where customer is not created
            Log::error("Customer was not created for row: " . json_encode($row));
            return null;
        }

        $date = $this->convertExcelDate($row['Date'] ?? '');

        if (!$date) {
            Log::error("Date is null or empty for row: " . json_encode($row));
            return null;
        }

        $tyre_fitment_count = $row['No. of Tyre Ftmnt'] ?? 0;
        $wheel_blancing_count = $row['Number of Wheel Blcng'] ?? 0;

        $order = Order::updateOrCreate(
            [
                'vehicle_reg' => strtoupper($row['Registration No.'] ?? ""),
                'bill_no' => $row['Bill No.'] ?? "",
                'user_id' => $customerId,
                'date' => $date,
            ],
            [
                'job_card_number' => $row['Job Card No.'] ?? "",
                'Agent_or_WShpName' => $row['Agent/ WShp Name'] ?? "",
                'tyre_fitment_count' => $row['No. of Tyre Ftmnt'] ?? "",
                'tyre_fitment_total' => $row['Tyre Ftmnt Chrg.'] ?? "",
                'tyre_fitment_rate' => $tyre_fitment_count != 0 ? ($row['Tyre Ftmnt Chrg.'] / $tyre_fitment_count) : 0,
                'tyre_fitment_beforegst_total' => isset($row['Tyre Ftmnt Chrg.']) ? $row['Tyre Ftmnt Chrg.'] * (100 / (100 + 18)) : "",
                '_9GST' => $row['9%'] ?? "",
                'whl_a_or_o' => $row['Whl(A/O)'] ?? "",
                'wheel_size' => $row['Whl Sze (")'] ?? "",
                'wheel_blancing_count' => $row['Number of Wheel Blcng'] ?? "",
                'wheel_blancing_total' => $row['Whl Blncng Chrg.'] ?? "",
                'wheel_blancing_rate' => $wheel_blancing_count != 0 ? ($row['Whl Blncng Chrg.'] / $wheel_blancing_count) : 0,
                'wheel_blancing_beforegst_total' => isset($row['Whl Blncng Chrg.']) ? $row['Whl Blncng Chrg.'] * (100 / (100 + 18)) : "",
                'gram_weight_used_ttl' => $row['Ttl Gm. Wt. Used'] ?? "",
                'gram_weight_total' => $row['Cost of Wght'] ?? "",
                'gram_weight_beforegst_total' => isset($row['Cost of Wght']) ? $row['Cost of Wght'] * (100 / (100 + 18)) : "",
                'gram_weight_rate_per_gm' => isset($row['Cost of Wght']) && $row['Cost of Wght'] != 0 ? ($row['Whl(A/O)'] == 'A' || $row['Whl(A/O)'] == 'a' ? 2 : ($row['Whl(A/O)'] == 'O' || $row['Whl(A/O)'] == 'o' ? 0.9 : 0)) : "",
                'alingment_total' => $row['Algnmnt Charge'] ?? "",
                'alingment_beforegst_total' => isset($row['Algnmnt Charge']) ? $row['Algnmnt Charge'] * (100 / (100 + 18)) : "",
                'other_total' => $row['Others (N2, Pnctre repair, ..)'] ?? "",
                'other_type' => "",
                'other_beforegst_total' => $row['Others B4 GST (18%)'] ?? "",
                'total_inc_gst' => $row['TOTAL (incl. GST)'] ?? "",
                'total_beforegst' => $row['TOTAL (B4 GST)'] ?? "",
                'no_of_tyre_purchased' => $row['No. of Tyres Purchased'] ?? "",
                'tyre_rate' => "",
                'tyre_rate_total' => "",
                'coupon_id' => "",
                'others_discount' => $row['Other Discount'] ?? "",
                'discount_purchase' => $row['Dscnt on Purchase'] ?? "",
                'total_discount_incgst' => $row['Total Dscnt (incl. GST)'] ?? "",
                'total_discount_beforegst' => $row['Total Discount (B4 GST)'] ?? "",
                'grand_total' => $row['Grand Total'] ?? "",
                'amount_recived' => $row['Amount Received'] ?? "",
                'amount_recieved_beforegst' => $row['AMT Rcvd B4 GST'] ?? "",
                'KFC_frm_010819' => $row['KFC (frm 010819)'] ?? "",
                'CGST_amount_recived' => $row['CGST (AMT Rcvd)'] ?? "",
                'SGST_amount_recived' => $row['SGST (AMT Rcvd)'] ?? "",
                'remarks' => $row['REMARKS'] ?? "",
                'shop_id' => $shop_id ?? "",
            ]
        );
        
    }

    private function convertExcelDate($excelDate)
    {
        if (is_numeric($excelDate)) {
            return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($excelDate)->format('Y-m-d');
        }

        return null;
    }
}
