<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Student([
            'last_name' => $row[0],
            'first_name' => $row[1],
            'avatar' => $row[2],
            'grade_id' => $row[3]
        ]);
    }
}
