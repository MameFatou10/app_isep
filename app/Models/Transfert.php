<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfert extends Model
{
   use HasFactory;

    protected $fillable = ['montant', 'rib_source', 'rib_destination'];
}
