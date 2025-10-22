<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfert extends Model
{

    protected $fillable = [
        'type', 'montant','contact_id'
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
