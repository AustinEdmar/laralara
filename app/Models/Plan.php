<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
  protected $fillable = ['name', 'url', 'price', 'description'];

  public function details()
  {
    // cria o relacionamento da model plan e detailplan  
    // que um de um para muitos
    return $this->hasMany(DetailPlan::class);
  }


// ira receber o filter que esta a vir la do for mulario name="filter" pode ser null
//para evitar erros
  public function search($filter = null)
  {
    
    $results = $this->where('name', 'Like', "%{$filter}%")
                    ->orwhere('description', 'Like', "%{$filter}%")
                    ->paginate(3);
                  // faco um get para retornar todos os dados 
                  return $results;
                  // e retorno o resultado
  }
}
