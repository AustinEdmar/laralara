<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPlan extends Model
{
    // criei um atributo paa indicar qual e a tabela no banco
    protected $table = 'details_plan';

    public function plan()
    {
        // pertence a 
            $this->belongsTo(Plan::class);
    }
}
