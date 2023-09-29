<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'clientes';

    protected $fillable = ['vehicle_id','names', 'lastname', 'lastname2', 'RUT', 'email','deadline', 'returndate'];

    public function vehicle () {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }
}
