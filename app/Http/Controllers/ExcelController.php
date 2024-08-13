<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AlignImport;
use App\Imports\customerImport;

class ExcelController extends Controller
{

    public function alignment_upload(Request $request)
    {
        ini_set('memory_limit', '1G');
        ini_set('max_execution_time', 300);
        $request->validate([
            'excel_file' => 'required | mimes:xlsx',
        ]);
        Excel::import(new AlignImport, $request->file('excel_file'));
        return redirect()->back()->with('success', 'succesfull');
    }
    public function order_upload(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx',
        ]);
    
        try {
            ini_set('memory_limit', '1G');
            ini_set('max_execution_time', 300);
    
            $file = $request->file('excel_file');
    
            $filePath = $file->store('temp');
    
            // new ImportJob($filePath, new CustomerImport);
            Excel::import(new CustomerImport, storage_path('app/' . $filePath));
    
            return redirect()->back()->with('success', 'Import started. You will be notified once it is completed.');
        } catch (\Exception $e) {
            Log::error('Error during import: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error during import: ' . $e->getMessage());
        }
    }
}
