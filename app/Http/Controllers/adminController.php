<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Allignments;
use App\Models\coupon;
use App\Models\order;
use App\Models\vehicle_info;
use App\Models\customer;
use App\Models\category;
use App\Models\subcategory;
use App\Models\User;
use App\Models\gallery;
use App\Models\banner;
use App\Models\news;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

class AdminController extends Controller
{

    public function index()
    {
        $order = Order::count();
        $vehicle_info = vehicle_info::count();
        $customer = Customer::count();

        return view('admin.dashboard', compact('order', 'vehicle_info', 'customer'));
    }
    public function admin() {}
    public function order()
    {
        // $orders= new order();
        $shop_id = auth()->user()->id;
        $data['vehicle_reg'] = vehicle_info::get();
        $data['Allignments'] = Allignments::get();
        $data['category'] = subcategory::get();
        $data['coupon'] = coupon::get();
        $data['customer'] = customer::get();
        if ($shop_id == 1) {

            $data['order'] = Order::get();
        } else {
            $data['order'] = Order::join('vehicle_infos', 'vehicle_infos.registration_no', '=', 'orders.vehicle_reg')
                // ->join('coupons', 'coupons.code', '=', 'orders.coupon_id')
                ->where('orders.shop_id', $shop_id)
                ->select(
                    'vehicle_infos.id as vehicle_id',
                    'orders.id as id',
                    // 'coupons.id as coupons_id',
                    'vehicle_infos.vehicle_model',
                    'vehicle_infos.vehicle_type',
                    'vehicle_infos.vehicle_name',
                    'orders.*'
                )
                ->get();
        }

        return view('admin.order', $data);
    }
    public function getTyreFitmentPrice(Request $request)
    {
        $whl_a_or_o = $request->input('whl_a_or_o');
        $wheel_size = $request->input('wheel_size');
        $fitment_no_of = $request->input('fitment_no_of');

        if (strtolower($whl_a_or_o) === 'a') {
            $tyre_fitment_type = "Alloy Rims";
        } elseif (strtolower($whl_a_or_o) === 'o') {
            $tyre_fitment_type = "Ordinary Rims";
        } else {
            return response()->json(['price' => 0], 400);
        }

        $rate = Subcategory::where('subcategory', $tyre_fitment_type)
            ->where('category_id', 2)
            ->where('type_or_value', $wheel_size)
            ->value('price');

        if ($rate) {
            $price = $rate * $fitment_no_of;
        } else {
            $price = 0;
        }

        return response()->json(['price' => $price]);
    }

    public function getWheelBalancingPrice(Request $request)
    {
        $whl_a_or_o = $request->input('whl_a_or_o');
        $wheel_size = $request->input('wheel_size');
        $wheel_blancing_count = $request->input('wheel_blancing_count');
        if (strtolower($whl_a_or_o) === 'a') {
            $wheel_blancing_type = "Alloy Rims";
        } elseif (strtolower($whl_a_or_o) === 'o') {
            $wheel_blancing_type = "Ordinary Rims";
        } else {
            return response()->json(['price' => 0], 400);
        }
        $rate = subcategory::where('subcategory', $wheel_blancing_type)
            ->where('category_id', 3)
            ->where('type_or_value', $wheel_size)
            ->value('price');
        if ($rate) {
            $price = $rate * $wheel_blancing_count;
        } else {
            $price = 0;
        }
        return response()->json(['rate' => $price]);
    }
    public function getAlignmentRate(Request $request)
    {
        $registration_no = $request->input('registration_no');

        $rate = vehicle_info::join('allignments', 'allignments.Mfg', '=', 'vehicle_infos.vehicle_name')
            // ->join('allignments as align2', 'align2.Vehicle_Model', '=', 'vehicle_infos.vehicle_model')
            ->where('vehicle_infos.registration_no', $registration_no)
            ->select('allignments.rate')
            ->first();

        return response()->json(['rate' => $rate ? $rate->rate : null]);
    }
    public function getCustomerDetails($vehicle_reg)
    {
        $vehicleInfo = vehicle_info::where('vehicle_reg', $vehicle_reg)->first();

        if ($vehicleInfo) {
            $customer = Customer::find($vehicleInfo->customer_id);

            if ($customer) {
                return response()->json([
                    'name' => $customer->name,
                    'telephone' => $customer->telephone,
                    'address' => $customer->address,
                    'make' => $vehicleInfo->make,
                    'wheel_size' => $vehicleInfo->wheel_size,
                ]);
            } else {
                return response()->json(['error' => 'Customer not found'], 404);
            }
        } else {
            return response()->json(['error' => 'Vehicle info not found'], 404);
        }
    }



    public function discount_purchase(Request $request)
    {
        $coupon = $request->input('coupon');
        $tyre_rate_total = $request->input('tyre_rate_total');
        $couponData = coupon::where('code', $coupon)->select('Percentage')->first();

        if ($couponData) {
            $percentage = $couponData->Percentage;
            $rate = $tyre_rate_total - ($tyre_rate_total * ($percentage / 100));
            return response()->json(['rate' => $rate]);
        } else {
            return response()->json(['error' => 'Invalid coupon code'], 400);
        }
    }

    public function others_total(Request $request)
    {
        $checkedValues = $request->input('checkedValues');
        $count = count($checkedValues);
        $rate = 0;

        for ($i = 0; $i < $count; $i++) {
            $rates = subcategory::where('id', $checkedValues[$i])
                ->where(function ($query) {
                    $query->where('category_id', '!=', 2)
                        ->where('category_id', '!=', 3);
                })
                ->value('price');

            $rate += $rates;
        }

        return response()->json(['rate' => $rate]);
    }



    public function order_action(Request $request)
    {
        $validatedData = $request->validate([
            'fitment[]' => 'nullable|array',
            'balancing[]' => 'nullable|array',
            'tyre_fitment_count' => 'nullable',
            'wheel_balancing_count' => 'nullable|integer',
            'weight_l_f' => 'nullable',
            'weight_r_f' => 'nullable',
            'weight_l_r' => 'nullable',
            'weight_r_r' => 'nullable',
            'weight_stepney' => 'nullable',

            'weight_total' => 'nullable',

            // Alignment validation
            'alignment_l_f_exst[]' => 'nullable|array',
            'alignment_l_f_exst_remarks' => 'nullable|string|max:255',
            'alignment_r_f_exst[]' => 'nullable|array',
            'alignment_r_f_exst_remarks' => 'nullable|string|max:255',
            'alignment_l_r_exst[]' => 'nullable|array',
            'alignment_l_r_exst_remarks' => 'nullable|string|max:255',
            'alignment_r_r_exst[]' => 'nullable|array',
            'alignment_r_r_exst_remarks' => 'nullable|string|max:255',
            'alignment_l_f[]' => 'nullable|array',
            'alignment_l_f_remarks' => 'nullable|string|max:255',
            'alignment_r_f[]' => 'nullable|array',
            'alignment_r_f_remarks' => 'nullable|array',
            // Wear and air pressure validation
            'wear_inner_f_l' => 'nullable|string|max:255',
            'wear_inner_f_r' => 'nullable|string|max:255',
            'wear_inner_r_l' => 'nullable|string|max:255',
            'wear_inner_r_r' => 'nullable|string|max:255',
            'wear_inner_stepney' => 'nullable|string|max:255',
            'wear_outer_f_l' => 'nullable|string|max:255',
            'wear_outer_f_r' => 'nullable|string|max:255',
            'wear_outer_r_l' => 'nullable|string|max:255',
            'wear_outer_r_r' => 'nullable|string|max:255',
            'wear_outer_stepney' => 'nullable|string|max:255',
            'wear_uneven_f_l' => 'nullable|string|max:255',
            'wear_uneven_f_r' => 'nullable|string|max:255',
            'wear_uneven_r_l' => 'nullable|string|max:255',
            'wear_uneven_r_r' => 'nullable|string|max:255',
            'wear_uneven_stepney' => 'nullable|string|max:255',
            'air_before_f_l' => 'nullable|string|max:255',
            'air_before_f_r' => 'nullable|string|max:255',
            'air_before_r_l' => 'nullable|string|max:255',
            'air_before_r_r' => 'nullable|string|max:255',
            'air_before_stepney' => 'nullable|string|max:255',
            'air_after_f_l' => 'nullable|string|max:255',
            'air_after_f_r' => 'nullable|string|max:255',
            'air_after_r_l' => 'nullable|string|max:255',
            'air_after_r_r' => 'nullable|string|max:255',
            'air_after_stepney' => 'nullable|string|max:255',
            'before_remarks' => 'nullable|string|max:255',
            // Tyre purchase details validation
            'tyre_size' => 'nullable',
            'tyre_brand' => 'nullable',
            'tyre_pattern' => 'nullable',
            'no_of_tyre_purchased' => 'nullable|integer',
            'tyre_rate' => 'nullable|numeric',
            'serial_no_alphanum' => 'nullable|array',
            'serial_no_week' => 'nullable|array',
            'serial_no_year' => 'nullable|array',
            // Additional services and pricing
            'other_option' => 'nullable|string|max:255',
            'other_type[]' => 'nullable|array',
            'price_tubeless' => 'nullable|numeric',
            'price_nitrogen' => 'nullable|numeric',
            'price_tyre_rotation' => 'nullable|numeric',
            'other_text' => 'nullable|string|max:255',
            'price_other_text' => 'nullable|string|max:255',
            // Final pricing breakdown
            'tyre_fitment' => 'nullable|numeric',
            'wheel_balancing' => 'nullable|numeric',
            'wheel_alignment' => 'nullable|numeric',
            'gram_weight_used' => 'nullable|numeric',
            'tyre_purchase' => 'nullable|numeric',
            'others' => 'nullable|numeric',
            'total' => 'nullable|numeric',
            'discount_amount' => 'nullable|numeric',
            'net_amount' => 'nullable|numeric',
            'total_gst' => 'nullable|numeric',
            'sgst' => 'nullable|numeric',
            'cgst' => 'nullable|numeric',
            // Foreign keys
            'customer_id' => 'required|integer|exists:customers,id',
            'vehicle_id' => 'required|integer|exists:vehicle_infos,id',
        ]);
        $userId = Auth::user()->id;
        $lastOrder = Order::where('shop_id', $userId)->orderBy('id', 'desc')->first();

        if ($lastOrder) {
            $lastBillNo = $lastOrder->bill_no;
            $lastBillNumber = (int) substr($lastBillNo, strlen('sh' . $userId));
            $nextBillNumber = $lastBillNumber + 1;
        } else {
            $nextBillNumber = 1;
        }
        $newBillNo = 'sh' . $userId . str_pad($nextBillNumber, 5, '0', STR_PAD_LEFT);

        $existingVehicle = vehicle_info::where('vehicle_reg', $request->input('vehicle_reg'))->first();

        if ($existingVehicle) {
            $customerId = $existingVehicle->customer_id;
            $vehicleId = $existingVehicle->id;
            $vehicle_info = vehicle_info::find($vehicleId);
            $vehicle_info->vehicle_reg = $request->input('vehicle_reg');
            $vehicle_info->make = $request->input('make');
            $vehicle_info->ODO_meter_reading = $request->input('ODO_meter_reading');
            $vehicle_info->average_run_per_day = $request->input('average_run_per_day');
            $vehicle_info->wheel_size = $request->input('wheel_size');
            $vehicle_info->whl_a_or_o = $request->input('whl_a_or_o');
            $vehicle_info->save();
            $customer = Customer::find($customerId);
            $customer->name = $request->input('name');
            $customer->address = $request->input('address');
            $customer->telephone = $request->input('telephone');
            $customer->save();
        } else {
            $customer = new Customer();
            $customer->name = $request->input('name');
            $customer->address = $request->input('address');
            $customer->telephone = $request->input('telephone');
            $customer->save();
            $customerId = $customer->id;

            $vehicle_info = new vehicle_info();
            $vehicle_info->vehicle_reg = $request->input('vehicle_reg');
            $vehicle_info->make = $request->input('make');
            $vehicle_info->ODO_meter_reading = $request->input('ODO_meter_reading');
            $vehicle_info->average_run_per_day = $request->input('average_run_per_day');
            $vehicle_info->wheel_size = $request->input('wheel_size');
            $vehicle_info->whl_a_or_o = $request->input('whl_a_or_o');
            $vehicle_info->customer_id = $customerId;
            $vehicle_info->save();
            $vehicleId = $vehicle_info->id;
        }


        $order = new Order();
        $order->bill_no1 = $newBillNo;
        $order->order_date = $request->input('date');
        $order->fitment = implode(', ', $validatedData['fitment[]'] ?? []);
        $order->balancing = implode(', ', $validatedData['balancing[]'] ?? []);
        $order->tyre_fitment_count = $validatedData['tyre_fitment_count'] ?? 0;
        $order->wheel_balancing_count = $validatedData['wheel_balancing_count'] ?? 0;
        $order->weight_lf = $validatedData['weight_l_f'] ?? 0;
        $order->weight_rf = $validatedData['weight_r_f'] ?? 0;
        $order->weight_lr = $validatedData['weight_l_r'] ?? 0;
        $order->weight_rr = $validatedData['weight_r_r'] ?? 0;
        $order->weight_stepney = $validatedData['weight_stepney'] ?? 0;
        $order->weight_total = $validatedData['weight_total'] ?? 0;
        // Alignment data
        $order->alignment_l_f_exst = implode(', ', $validatedData['alignment_l_f_exst[]'] ?? []);
        $order->alignment_l_f_exst_remarks = $validatedData['alignment_l_f_exst_remarks'] ?? '';
        $order->alignment_r_f_exst = implode(', ', $validatedData['alignment_r_f_exst[]'] ?? []);
        $order->alignment_r_f_exst_remarks = $validatedData['alignment_r_f_exst_remarks'] ?? '';
        $order->alignment_l_r_exst = implode(', ', $validatedData['alignment_l_r_exst[]'] ?? []);
        $order->alignment_l_r_exst_remarks = $validatedData['alignment_l_r_exst_remarks'] ?? '';
        $order->alignment_r_r_exst = implode(', ', $validatedData['alignment_r_r_exst[]'] ?? []);
        $order->alignment_r_r_exst_remarks = $validatedData['alignment_r_r_exst_remarks'] ?? '';
        $order->alignment_l_f = implode(', ', $validatedData['alignment_l_f[]'] ?? []);
        $order->alignment_l_f_remarks = $validatedData['alignment_l_f_remarks'] ?? '';
        $order->alignment_r_f = implode(', ', $validatedData['alignment_r_f[]'] ?? []);
        $order->alignment_r_f_remarks = json_encode($validatedData['alignment_r_f_remarks'] ?? []);
        // Wear and air pressure
        $order->wear_inner_f_l = $validatedData['wear_inner_f_l'] ?? '';
        $order->wear_inner_f_r = $validatedData['wear_inner_f_r'] ?? '';
        $order->wear_inner_r_l = $validatedData['wear_inner_r_l'] ?? '';
        $order->wear_inner_r_r = $validatedData['wear_inner_r_r'] ?? '';
        $order->wear_inner_stepney = $validatedData['wear_inner_stepney'] ?? '';
        $order->wear_outer_f_l = $validatedData['wear_outer_f_l'] ?? '';
        $order->wear_outer_f_r = $validatedData['wear_outer_f_r'] ?? '';
        $order->wear_outer_r_l = $validatedData['wear_outer_r_l'] ?? '';
        $order->wear_outer_r_r = $validatedData['wear_outer_r_r'] ?? '';
        $order->wear_outer_stepney = $validatedData['wear_outer_stepney'] ?? '';
        $order->wear_uneven_f_l = $validatedData['wear_uneven_f_l'] ?? '';
        $order->wear_uneven_f_r = $validatedData['wear_uneven_f_r'] ?? '';
        $order->wear_uneven_r_l = $validatedData['wear_uneven_r_l'] ?? '';
        $order->wear_uneven_r_r = $validatedData['wear_uneven_r_r'] ?? '';
        $order->wear_uneven_stepney = $validatedData['wear_uneven_stepney'] ?? '';
        $order->air_before_f_l = $validatedData['air_before_f_l'] ?? '';
        $order->air_before_f_r = $validatedData['air_before_f_r'] ?? '';
        $order->air_before_r_l = $validatedData['air_before_r_l'] ?? '';
        $order->air_before_r_r = $validatedData['air_before_r_r'] ?? '';
        $order->air_before_stepney = $validatedData['air_before_stepney'] ?? '';
        $order->air_after_f_l = $validatedData['air_after_f_l'] ?? '';
        $order->air_after_f_r = $validatedData['air_after_f_r'] ?? '';
        $order->air_after_r_l = $validatedData['air_after_r_l'] ?? '';
        $order->air_after_r_r = $validatedData['air_after_r_r'] ?? '';
        $order->air_after_stepney = $validatedData['air_after_stepney'] ?? '';
        $order->before_remarks = $validatedData['before_remarks'] ?? '';
        // Tyre purchase details
        $order->tyre_size = $validatedData['tyre_size'] ?? '';
        $order->tyre_brand = $validatedData['tyre_brand'] ?? '';
        $order->tyre_pattern = $validatedData['tyre_pattern'] ?? '';
        $order->no_of_tyre_purchased = $validatedData['no_of_tyre_purchased'] ?? 0;
        $order->tyre_rate = $validatedData['tyre_rate'] ?? 0;
        $order->serial_no_alphanum = json_encode($validatedData['serial_no_alphanum'] ?? []);
        $order->serial_no_week = json_encode($validatedData['serial_no_week'] ?? []);
        $order->serial_no_year = json_encode($validatedData['serial_no_year'] ?? []);
        // Additional services and pricing
        $order->other_option = $validatedData['other_option'] ?? '';
        $order->other_type = json_encode($validatedData['other_type[]'] ?? []);
        $order->price_tubeless = $validatedData['price_tubeless'] ?? 0;
        $order->price_nitrogen = $validatedData['price_nitrogen'] ?? 0;
        $order->price_tyre_rotation = $validatedData['price_tyre_rotation'] ?? 0;
        $order->other_text = $validatedData['other_text'] ?? '';
        $order->price_other_text = $validatedData['price_other_text'] ?? '';
        // Final pricing breakdown
        $order->tyre_fitment = $validatedData['tyre_fitment'] ?? 0;
        $order->wheel_balancing = $validatedData['wheel_balancing'] ?? 0;
        $order->wheel_alignment = $validatedData['wheel_alignment'] ?? 0;
        $order->gram_weight_used = $validatedData['gram_weight_used'] ?? 0;
        $order->tyre_purchase = $validatedData['tyre_purchase'] ?? 0;
        $order->others = $validatedData['others'] ?? 0;
        $order->total = $validatedData['total'] ?? 0;
        $order->discount_amount = $validatedData['discount_amount'] ?? 0;
        $order->net_amount = $validatedData['net_amount'] ?? 0;
        $order->total_gst = $validatedData['total_gst'] ?? 0;
        $order->sgst = $validatedData['sgst'] ?? 0;
        $order->cgst = $validatedData['cgst'] ?? 0;
        $order->customer_id = $customerId;
        $order->vehicle_id = $vehicleId;
        $order->shop_id = auth()->user()->id;
        $order->save();
        return redirect('/admin/order');
    }


    public function order_delete($id)
    {
        order::where('id', $id)->delete();
        return redirect('/admin/order');
    }
    public function order_edit(Request $request, $id)
    {

        $order = order::findOrFail($id);



        $order->vehicle_reg = $request->input('vehicle_reg');
        $order->bill_no = $request->input('bill_no');
        $order->date = $request->input('date');
        $order->job_card_number = $request->input('job_card_number');
        $order->Agent_or_WShpName = $request->input('Agent_or_WShpName');
        $order->tyre_fitment_count = $request->input('tyre_fitment_count');
        $order->tyre_fitment_rate = $request->input('tyre_fitment_rate');
        $order->tyre_fitment_total = $request->input('tyre_fitment_total');
        $order->tyre_fitment_beforegst_total = $request->input('tyre_fitment_beforegst_total');
        $order->_9GST = $request->input('_9GST');
        $order->whl_a_or_o = $request->input('whl_a_or_o');
        $order->wheel_size = $request->input('wheel_size');
        $order->wheel_blancing_count = $request->input('wheel_blancing_count');
        $order->wheel_blancing_rate = $request->input('wheel_blancing_rate');
        $order->wheel_blancing_total = $request->input('wheel_blancing_total');
        $order->wheel_blancing_beforegst_total = $request->input('wheel_blancing_beforegst_total');
        $order->gram_weight_used_ttl = $request->input('gram_weight_used_ttl');
        $order->gram_weight_rate_per_gm = 0;
        $order->gram_weight_total = $request->input('gram_weight_total');
        $order->gram_weight_beforegst_total = $request->input('gram_weight_beforegst_total');
        $order->alingment_total = $request->input('alingment_total');
        $order->alingment_beforegst_total = $request->input('alingment_beforegst_total');
        $order->other_type = json_encode($request->input('other_type'));
        $order->other_total = $request->input('other_total');
        $order->other_beforegst_total = $request->input('other_beforegst_total');
        $order->total_inc_gst = $request->input('total_inc_gst');
        $order->total_beforegst = $request->input('total_beforegst');
        $order->no_of_tyre_purchased = $request->input('no_of_tyre_purchased');
        $order->tyre_rate = $request->input('tyre_rate');
        $order->tyre_rate_total = $request->input('tyre_rate_total');
        $order->others_discount = $request->input('others_discount');
        $order->discount_purchase = $request->input('discount_purchase');
        $order->coupon_id = $request->input('coupon_id');
        $order->total_discount_incgst = $request->input('total_discount_incgst');
        $order->total_discount_beforegst = $request->input('total_discount_beforegst');
        $order->grand_total = $request->input('grand_total');
        $order->amount_recived = $request->input('amount_recived');
        $order->amount_recieved_beforegst = $request->input('amount_recieved_beforegst');
        $order->KFC_frm_010819 = 0;
        $order->CGST_amount_recived = $request->input('CGST_amount_recived');
        $order->SGST_amount_recived = $request->input('SGST_amount_recived');
        $order->remarks = $request->input('remarks', '');
        $order->save();
        return redirect('/admin/order');
    }


    public function alignment()
    {
        $data['alignments'] = Allignments::all();
        return view('admin.alignment', $data);
    }

    public function alignment_action(Request $request)
    {
        $request->validate([
            'Manufacturer' => 'nullable|string|max:255',
            'VehicleModel' => 'nullable|string|max:255',
            'Mfg+Vehicle' => 'nullable|string|max:255',
            'algnRate' => 'nullable|numeric',
        ]);

        $alignment = new Allignments();
        $alignment->Manufacturer = $request->input('Manufacturer');
        $alignment->Vehicle_Model = $request->input('VehicleModel');
        $alignment->Mfg = $request->input('Mfg+Vehicle');
        $alignment->rate = $request->input('algnRate');
        $alignment->save();

        return redirect('/admin/alignment');
    }

    public function alignment_delete($id)
    {
        Allignments::where('id', $id)->delete();
        return redirect('/admin/alignment');
    }

    public function alignment_edit(Request $request, $id)
    {
        $alignment = Allignments::findOrFail($id);
        $request->validate([
            'Manufacturer' => 'nullable|string|max:255',
            'VehicleModel' => 'nullable|string|max:255',
            'Mfg+Vehicle' => 'nullable|string|max:255',
            'algnRate' => 'nullable|numeric',
        ]);

        $alignment->Manufacturer = $request->input('Manufacturer');
        $alignment->Vehicle_Model = $request->input('VehicleModel');
        $alignment->Mfg = $request->input('Mfg+Vehicle');
        $alignment->rate = $request->input('algnRate');
        $alignment->save();

        return redirect('/admin/alignment');
    }

    public function daily_month_report()
    {
        $shop_id = auth()->user()->id;

        if ($shop_id == 1) {
            $data['orders'] = Order::orderBy('date', 'asc')->get();
        } else {
            $data['orders'] = Order::where('shop_id', $shop_id)->orderBy('date', 'asc')->get();
        }

        return view('admin.daily_month_report', $data);
    }
    public function send($id)
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
        return view('admin.send', $data);
    }
    public function vehicle()
    {
        $shop_id = auth()->user()->id;
        $data['allignments'] = Allignments::select('Mfg', 'Vehicle_Model')->get();
        $data['customer'] = customer::get();
        // if ($shop_id == 1) {
        $data['vehicle_info'] = vehicle_info::join('customers', 'customers.registration_no', '=', 'vehicle_infos.registration_no')
            ->select('customers.id as customer_id', 'vehicle_infos.id as id', 'customers.name', 'customers.telephone', 'vehicle_infos.*')
            ->get();
        // } else {
        //     $data['vehicle_info'] = vehicle_info::join('customers', 'customers.registration_no', '=', 'vehicle_infos.registration_no')
        //         // ->join('orders', 'orders.vehicle_reg', '=', 'vehicle_infos.registration_no')
        //         ->where('customers.shop_id', $shop_id)
        //         ->select('customers.id as customer_id', 'vehicle_infos.id as id', 'customers.name', 'customers.telephone', 'vehicle_infos.*')
        //         ->get();
        // }


        return view('admin.vehicle', $data);
    }
    public function vehicle_action(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:255',
            'vehicle_model' => 'nullable|string|max:255',
            'vehicle_type' => 'nullable|string|max:255',
            'vehicle_name' => 'nullable|string|max:255',
            'registration_no' => 'nullable|string|max:255',
            'ODO_meter_reading' => 'nullable|string|max:255',
            'previous_align' => 'nullable|string|max:255',
            'KM_after_previous_align' => 'nullable|string|max:255',
            'average_run_per_day' => 'nullable|string|max:255',
        ]);

        $vehicle_info = new vehicle_info();
        // $vehicle_info->customer_id = $request->input('customer_id');
        $vehicle_info->Vehicle_Model = $request->input('vehicle_model');
        $vehicle_info->vehicle_type = $request->input('vehicle_type');
        $vehicle_info->vehicle_name = $request->input('vehicle_name');
        $vehicle_info->registration_no = $request->input('registration_no');
        $vehicle_info->ODO_meter_reading = $request->input('ODO_meter_reading');
        $vehicle_info->previous_align = $request->input('previous_align');
        $vehicle_info->KM_after_previous_align = $request->input('KM_after_previous_align');
        $vehicle_info->average_run_per_day = $request->input('average_run_per_day');
        $vehicle_info->save();
        $customer = new customer();
        $customer->name = $request->input('name');
        $customer->address = $request->input('address');
        $customer->registration_no = $request->input('registration_no');
        $customer->telephone = $request->input('telephone');
        $customer->role_id = 2;
        $customer->shop_id = auth()->user()->id;
        $customer->save();
        return redirect('/admin/vehicle');
    }
    public function vehicle_delete($id)
    {
        vehicle_info::where('id', $id)->delete();
        return redirect('/admin/vehicle');
    }
    public function vehicle_edit(Request $request, $id)
    {
        $vehicle_info = vehicle_info::findOrFail($id);
        $request->validate([
            'vehicle_model' => 'nullable|string|max:255',
            'vehicle_type' => 'nullable|string|max:255',
            'vehicle_name' => 'nullable|string|max:255',
            'registration_no' => 'nullable|string|max:255',
            'ODO_meter_reading' => 'nullable|string|max:255',
            'previous_align' => 'nullable|string|max:255',
            'KM_after_previous_align' => 'nullable|string|max:255',
            'average_run_per_day' => 'nullable|string|max:255',
        ]);

        // $vehicle_info = new vehicle_info(); // This line should be removed
        // Update the existing vehicle_info object
        $vehicle_info->vehicle_model = $request->input('vehicle_model');
        $vehicle_info->vehicle_type = $request->input('vehicle_type');
        $vehicle_info->vehicle_name = $request->input('vehicle_name');
        $vehicle_info->registration_no = $request->input('registration_no');
        $vehicle_info->ODO_meter_reading = $request->input('ODO_meter_reading');
        $vehicle_info->previous_align = $request->input('previous_align');
        $vehicle_info->KM_after_previous_align = $request->input('KM_after_previous_align');
        $vehicle_info->average_run_per_day = $request->input('average_run_per_day');
        $vehicle_info->save();

        return redirect('/admin/vehicle');
    }

    public function coupon()
    {

        $data['coupon'] = coupon::get();
        return view('admin.coupon', $data);
    }
    public function coupon_action(Request $request)
    {

        $request->validate([
            'code' => 'nullable|string|max:255',
            'percentage' => 'nullable|string|max:255',
        ]);

        $coupon = new coupon();
        $coupon->code = $request->input('code');
        $coupon->percentage = $request->input('percentage');
        $coupon->save();

        return redirect('/admin/coupon');
    }
    public function coupon_delete($id)
    {

        coupon::where('id', $id)->delete();
        return redirect('/admin/coupon');
    }
    public function coupon_edit(Request $request, $id)
    {


        $coupon = coupon::findOrFail($id);


        $request->validate([
            'code' => 'nullable|string|max:255',
            'percentage' => 'nullable|string|max:255',
        ]);


        $coupon->code = $request->input('code');
        $coupon->percentage = $request->input('percentage');


        $coupon->save();

        return redirect('/admin/coupon');
    }
    public function customer()
    {
        $shop_id = auth()->user()->id;
        $data = [];
        $data['allignments'] = Allignments::select('Mfg', 'Vehicle_Model')->get();
        // if ($shop_id == 1) {
        $data['customer'] = Customer::join('vehicle_infos', 'vehicle_infos.registration_no', '=', 'customers.registration_no')
            ->select(
                'vehicle_infos.id as vehicle_id',
                'vehicle_infos.vehicle_type',
                'vehicle_infos.vehicle_model',
                'vehicle_infos.vehicle_name',
                'vehicle_infos.registration_no',
                'customers.*'
            )
            ->get();
        // } else {
        //     $data['customer'] = Customer::join('vehicle_infos', 'vehicle_infos.registration_no', '=', 'customers.registration_no')
        //         // ->join('orders', 'orders.vehicle_reg', '=', 'customers.registration_no')
        //         ->where('customers.shop_id', $shop_id)
        //         ->select(
        //             'vehicle_infos.id as vehicle_id',
        //             'vehicle_infos.vehicle_type',
        //             'vehicle_infos.vehicle_model',
        //             'vehicle_infos.vehicle_name',
        //             'vehicle_infos.registration_no',
        //             'customers.*'
        //         )
        //         ->get();
        // // }

        return view('admin.customer', $data);
    }
    public function category()
    {

        $data['category'] = category::get();
        return view('admin.category', $data);
    }
    public function category_action(Request $request)
    {

        $request->validate([
            'category' => 'nullable|string|max:255',
        ]);

        $category = new category();
        $category->category = $request->input('category');
        $category->save();

        return redirect('/admin/category');
    }
    public function category_delete($id)
    {

        category::where('id', $id)->delete();
        subcategory::where('category_id', $id)->delete();
        return redirect('/admin/category');
    }
    public function category_edit(Request $request, $id)
    {

        $coupon = category::findOrFail($id);

        $coupon->category = $request->input('category');
        $coupon->save();
        return redirect('/admin/category');
    }
    public function subcategory()
    {

        $data['category'] = category::get();
        $data['subcategory'] = subcategory::join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->select('categories.category as category_name',  'subcategories.*')
            ->get();
        return view('admin.subcategory', $data);
    }

    public function subcategory_action(Request $request)
    {

        $request->validate([
            'category' => 'nullable',
            'subcategory' => 'nullable|string|max:255',
            'type_or_value' => 'nullable|string|max:255',
            'price' => 'nullable|string|max:255',
        ]);

        $subcategory = new subcategory();
        $subcategory->category_id = $request->input('category');
        $subcategory->subcategory = $request->input('subcategory');
        $subcategory->type_or_value = $request->input('type_or_value');
        $subcategory->price = $request->input('price');
        $subcategory->save();

        return redirect('/admin/subcategory');
    }
    public function subcategory_delete($id)
    {

        subcategory::where('id', $id)->delete();
        return redirect('/admin/subcategory');
    }
    public function subcategory_edit(Request $request, $id)
    {

        $subcategory = subcategory::findOrFail($id);

        $subcategory->category_id = $request->input('category');
        $subcategory->subcategory = $request->input('subcategory');
        $subcategory->type_or_value = $request->input('type_or_value');
        $subcategory->price = $request->input('price');
        $subcategory->save();

        return redirect('/admin/subcategory');
    }

    public function sendInvoice(Request $request)
    {

        //     $order = Order::all(); 
        //     $pdf = PDF::loadView('invoice', compact('order'));
        //     $pdfPath = storage_path('app/public/invoice.pdf');
        //     $pdf->save($pdfPath);
        //     $sid = 'your_twilio_sid';
        //     $token = 'your_twilio_token';
        //     $twilio = new Client($sid, $token);

        //     $twilio->messages->create(
        //         'whatsapp:+917034950812',
        //         [
        //             'from' => 'whatsapp:+917034950812', 
        //             'body' => 'Here is your invoice',
        //             'mediaUrl' => [url('storage/invoice.pdf')]
        //         ]
        //     );

        //     return redirect()->back()->with('success', 'Invoice sent successfully!');
    }
    public function daily_month_search(Request $request)
    {
        $shop_id = auth()->user()->id;


        $searchDate = $request->input('date');
        if ($shop_id == 1) {
            $orders = Order::whereDate('date', $searchDate)->get();
        } else {
            $data['orders'] = Order::where('shop_id', $shop_id)->whereDate('date', $searchDate)->get();
        }
        $data = [];
        foreach ($orders as $order) {
            $data[] = [
                'month' => \Carbon\Carbon::parse($order->date)->format('F Y'),
                'date' => $order->date,
                'bill_no' => $order->bill_no,
                'amount_received_beforegst' => intval($order->amount_recieved_beforegst),
                'cgst' => number_format((intval($order->amount_recieved_beforegst) * 9) / 100, 2),
                'sgst' => number_format((intval($order->amount_recieved_beforegst) * 9) / 100, 2), // Assuming SGST calculation similar to CGST
                'kfc' => floatval($order->KFC_frm_010819),
                'amount_recived' => intval($order->amount_recieved_beforegst) +
                    (intval($order->amount_recieved_beforegst) * 9) / 100 * 2 +
                    floatval($order->KFC_frm_010819),
            ];
        }

        return response()->json($data);
    }
    public function shop()
    {
        $data['shop'] = User::where('role_id', 2)->get();
        return view('admin.shop', $data);
    }

    public function shop_action(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = 2;
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->back()->with('success', 'Shop created successfully.');
    }
    public function shop_edit(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    public function shop_delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }
    public function profile()
    {
        $id = auth()->user()->id;
        $data['profile'] = User::where('id', $id)->get();
        return view('admin.profile', $data);
    }
    public function profile_action(Request $request)
    {
        $id = auth()->user()->id;
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $password = $request->input('password');
        if ($password) {
            $user->password = Hash::make($password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function news()
    {
        $data['news'] = news::all();
        return view('admin.news', $data);
    }

    public function news_action(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'date' => 'required',
            'title' => 'required',
            'discription' => 'required'
        ]);

        $image = $request->file('image');
        $imageName = uniqid() . '_' . time() . '.' . $image->extension();

        $image->move(public_path('news'), $imageName);

        $news = new news();
        $news->image = 'news/' . $imageName;
        $news->date = $request->input('date');
        $news->title = $request->input('title');
        $news->discription = $request->input('discription');
        $news->save();

        return redirect('/admin/news')->with('success', 'news item created successfully.');
    }

    public function news_edit(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'date' => 'required',
            'title' => 'required',
            'discription' => 'required'
        ]);

        $news = news::find($id);

        if (!$news) {
            return redirect('/admin/news')->with('error', 'news item not found.');
        }

        $news->date = $request->input('date');
        $news->title = $request->input('title');
        $news->discription = $request->input('discription');
        if (!($request->file('image') == "")) {
            // $imagePath = public_path($news->image);
            $image = $request->file('image');
            $imageName = uniqid() . '_' . time() . '.' . $image->extension();
            $image->move(public_path('news'), $imageName);
            $news->image = 'news/' . $imageName;
        }
        $news->save();
        return redirect('/admin/news')->with('success', 'news item updated successfully.');
    }

    public function news_delete($id)
    {
        $news = news::find($id);

        if (!$news) {
            return redirect('/admin/news')->with('error', 'news item not found.');
        }

        $imagePath = public_path($news->image);

        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete image file
        }

        $news->delete();

        return redirect('/admin/news')->with('success', 'news item deleted successfully.');
    }
    public function gallery()
    {
        $data['gallery'] = gallery::get();
        return view('admin.gallery', $data);
    }

    public function gallery_action(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        try {
            $image = $request->file('image');
            $imageName = uniqid() . '_' . time() . '.' . $image->extension();

            $image->move(public_path('gallery'), $imageName);

            $gallery = new Gallery();
            $gallery->image = 'gallery/' . $imageName;
            $gallery->save();

            return redirect('/admin/gallery')->with('success', 'Gallery item added successfully.');
        } catch (\Exception $e) {
            Log::error('Error uploading gallery item: ' . $e->getMessage());
            return redirect('/admin/gallery')->with('error', 'Failed to upload gallery item.');
        }
    }
    public function gallery_edit(Request $request, $id)
    {
        try {
            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ]);
            $gallery = Gallery::find($id);
            if (!$gallery) {
                return redirect('/admin/gallery')->with('error', 'Gallery item not found.');
            }

            if ($request->hasFile('image')) {
                $this->deleteImage($gallery->image);

                $image = $request->file('image');
                $imageName = uniqid() . '_' . time() . '.' . $image->extension();
                $image->move(public_path('gallery'), $imageName);
                $gallery->image = 'gallery/' . $imageName;
            }

            $gallery->save();

            return redirect('/admin/gallery')->with('success', 'Gallery item updated successfully.');
        } catch (\Exception $e) {

            Log::error('Error updating gallery item: ' . $e->getMessage());


            return redirect('/admin/gallery')->with('error', 'Failed to update gallery item. Please try again.');
        }
    }

    private function deleteImage($imagePath)
    {
        $fullImagePath = public_path($imagePath);

        if (file_exists($fullImagePath)) {
            unlink($fullImagePath);
        }
    }


    public function gallery_delete($id)
    {
        $gallery = gallery::find($id);

        if (!$gallery) {
            return redirect('/admin/gallery')->with('error', 'gallery item not found.');
        }

        $imagePath = public_path('gallery/' . $gallery->image);

        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete image file
        }

        $gallery->delete();

        return redirect('/admin/gallery')->with('success', 'gallery item deleted successfully.');
    }
    public function banner()
    {
        $data['banner'] = banner::get();
        return view('admin.banner', $data);
    }

    public function banner_action(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        $image = $request->file('image');
        $imageName = uniqid() . '_' . time() . '.' . $image->extension();
        $image->move(public_path('banner'), $imageName);

        $banner = new banner();
        $banner->image = 'banner/' . $imageName;
        $banner->save();

        return redirect('/admin/banner')->with('success', 'Banner item added successfully.');
    }

    public function banner_edit(Request $request, $id)
    {
        try {
            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ]);
            $banner = banner::find($id);
            if (!$banner) {
                return redirect('/admin/banner')->with('error', 'Banner item not found.');
            }

            if ($request->hasFile('image')) {
                $this->deleteImage($banner->image);

                $image = $request->file('image');
                $imageName = uniqid() . '_' . time() . '.' . $image->extension();
                $image->move(public_path('banner'), $imageName);
                $banner->image = 'banner/' . $imageName;
            }

            $banner->save();

            return redirect('/admin/banner')->with('success', 'Banner item updated successfully.');
        } catch (\Exception $e) {

            Log::error('Error updating banner item: ' . $e->getMessage());


            return redirect('/admin/banner')->with('error', 'Failed to update banner item. Please try again.');
        }
    }

    public function banner_delete($id)
    {
        $banner = banner::find($id);

        if (!$banner) {
            return redirect('/admin/banner')->with('error', 'banner item not found.');
        }

        $imagePath = public_path('banner/' . $banner->image);

        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete image file
        }

        $banner->delete();

        return redirect('/admin/banner')->with('success', 'banner item deleted successfully.');
    }
}
