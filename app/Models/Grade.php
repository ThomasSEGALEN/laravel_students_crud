<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Grade extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'wording'
    ];

    public $sortable = [
        'id',
        'wording',
        'created_at',
        'updated_at'
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
