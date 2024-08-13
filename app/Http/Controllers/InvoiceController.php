<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function generatePDF()
    {
        return view('invoice');
    }
    // public function generatePDF($id)
    // {
        
        // $data['order'] = Order::join('vehicle_infos', 'vehicle_infos.registration_no', '=', 'orders.vehicle_reg')
        //     ->join('customers', 'customers.registration_no', '=', 'vehicle_infos.registration_no')
        //     ->where('orders.id', $id)
        //     ->select(
        //         'vehicle_infos.id as vehicle_id',
        //         'orders.id as id',
        //         'customers.id as customers_id',
        //         'vehicle_infos.vehicle_model',
        //         'vehicle_infos.vehicle_type',
        //         'vehicle_infos.vehicle_name',
        //         'vehicle_infos.ODO_meter_reading',
        //         'customers.name',
        //         'customers.address',
        //         'customers.telephone',
        //         'orders.*'
        //     )->get();
        
        // $html = view('admin.send', $data)->render();
        
        // $dompdf = new Dompdf();
        // $options = new Options();
        // $options->set('isHtml5ParserEnabled', true);
        // $options->set('isPhpEnabled', true);
        // $dompdf->setOptions($options);
        
        // $dompdf->loadHtml($html);
        // $dompdf->setPaper('A4', 'portrait');
        // $dompdf->render();
        
        // $dompdf->stream('invoice.pdf', array("Attachment" => 0));
    // }
    public function printwarranty($id)
    {
        $data['order'] = Order::join('vehicle_infos', 'vehicle_infos.registration_no', '=', 'orders.vehicle_reg')
            ->join('customers', 'customers.registration_no', '=', 'vehicle_infos.registration_no')
            ->where('orders.id', $id)
            ->select(
                'vehicle_infos.id as vehicle_id',
                'orders.id as id',
                'customers.id as customers_id',
                'vehicle_infos.vehicle_model',
                'vehicle_infos.vehicle_type',
                'vehicle_infos.vehicle_name',
                'vehicle_infos.ODO_meter_reading',
                'customers.name',
                'customers.address',
                'customers.telephone',
                'orders.*'
            )->get();
        
        $html = view('admin.warranty', $data)->render();
        
        $dompdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf->setOptions($options);
        
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        $dompdf->stream('warranty-card.pdf', array("Attachment" => 0));
    }
}
