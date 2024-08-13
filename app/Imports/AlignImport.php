<?php

namespace App\Imports;

use App\Models\allignments;use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class AlignImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new allignments([
            'Manufacturer' => $row['Manufacturer'] ?? "",
            'Vehicle_Model' => $row['Vehicle Model'] ?? "",
            'Mfg' => ($row['Manufacturer'] ?? '') ." ". ($row['Vehicle Model'] ?? ''),
            'rate' => $row['Algn Rate'] ?? "",
        ]);
    }
}
