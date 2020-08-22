<?php

namespace App\Http\Controllers\Admin;
use App\Models\DetailPlan;
use App\Models\Plan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DetailsPlanController extends Controller
{
    // vou criar um constructor que ira mandar a model detailsPlan no atributo
    protected $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
      $this->repository = $detailPlan;
      $this->plan = $plan;  
    }
    // vou receber o plano pela Url
    public function index($urlPlan)
    {
        // se nao achar redirect
      if(! $plan = $this->plan->where('url', $urlPlan)->first()){
            return redirect()->back();
            
      }
      // nosso model plan temos o metodo details estou acessa lo
      //$details= $plan->details();
      $details = $plan->details()->paginate();

      return view('admin.pages.plans.details.index', [
          'plan' =>$plan,
          'details' => $details,
      ]);
    }
}
