<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Student extends Model
{
    use HasFactory, Sortable;

    protected $table = 'students';

    public $primaryKey = 'id';

    public $timestaps = true;

    protected $fillable = [
        'last_name',
        'first_name',
        'avatar',
        'grade_id'
    ];

    public $sortable = [
        'id',
        'last_name',
        'first_name',
        'grade_id',
        'created_at',
        'updated_at'
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
