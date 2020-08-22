<?php

namespace App\Http\Controllers\Admin;
use App\Models\Plan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdatePlan;
use App\Observers\PlanObserver;

class PlanController extends Controller
{
    // criei um atributo que ira receber o plan
    private $repository;
    // vou criar um constructor para ter a dependencia de plano de forma mas facil
    public function __construct(Plan $plan)
    {
        // ira armazenar a model plan
        $this->repository = $plan;
        
    }

    public function index()
    {
        // agora vamos listar todos os planos
        $plans = $this->repository->latest()->paginate();

        // agora passo a variavel $plans para a view
        return view('admin.pages.plans.index', [
            'plans' =>$plans,
        ]) ;
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }
    // tenho que passar o request para pegar os dados que vem do formulario
    public function store(StoreUpdatePlan $request)
    {// agora vou fazer o cadastro do plano
        //pego o request all que 'e um array e adiciona no obj reposito que 'e do model Plan

       /*  $data = $request->all();
        kebab troquei a url por name
        $data['url'] = Str::kebab($request->name);

        $this->repository->create($data); */
        $this->repository->create($request->all());

        //se deu certo redireccione 

        return redirect()->route('plans.index');
        
    }

    public function show($url)
        {
            // crio uma variavel que ira receber o objecto repository do model plan onde a url
            //seja igual a url seja igual a do parametro, e first porque retorna um unico registro
            $plan = $this->repository->where('url', $url)->first();
            //caso nao encontrar irei redireccionar

            if(!$plan)
            return redirect()->back();
            // caso de deu cero redicione na 
            return view('admin.pages.plans.show', [
                'plan' =>$plan
            ]); 

        }
        
        public function destroy($url)
        {
            // crio uma variavel que ira receber o objecto repository do model plan onde a url
            //seja igual a url seja igual a do parametro, e first porque retorna um unico registro
            $plan = $this->repository->where('url', $url)->first();


            //caso nao encontrar irei redireccionar
            if(!$plan)
            return redirect()->back();
            // caso de deu cero redicione na 
            $plan->delete();

            return redirect()->route('plans.index'); 

        }

        public function search(Request $request)
        {
            $filters = $request->except('_token');
            // aqui pego o metodo search da model plan que estaribuida a var repository 
            $plans = $this->repository->search($request->filter);
            
            return view('admin.pages.plans.index', [
                'plans' => $plans,
                'filters' => $filters
            ]); 
        }

        public function edit($url)
        {

            // crio uma variavel que ira receber o objecto repository do model plan onde a url
            //seja igual a url seja igual a do parametro, e first porque retorna um unico registro
            $plan = $this->repository->where('url', $url)->first();


            //caso nao encontrar irei redireccionar
            if(!$plan)
            return redirect()->back();
            // se econtrar exibir na view

            return view('admin.pages.plans.edit', [
                'plan' => $plan
            ]); 


        }

        public function update(StoreUpdatePlan $request, $url)
        {
            $plan = $this->repository->where('url', $url)->first();


            //caso nao encontrar irei redireccionar
            if(!$plan)
            return redirect()->back();
                // pego no metodo update  e passo os arrays que quero actualizar
            $plan->update($request->all());
            // sdepois de dar certo redict a rota inde
            return redirect()->route('plans.index');
            
        }
}
