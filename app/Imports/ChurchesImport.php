<?php

namespace App\Imports;

use App\Models\Church;
use Maatwebsite\Excel\Concerns\ToModel;

class ChurchesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Church([
            'name' => $row[0],
            'grow_id' => $row[1],

        ]);
    }

    public function batchSize(): int
    {
        return 100;
    }
    
    public function chunkSize(): int
    {
        return 100;
    }
}
