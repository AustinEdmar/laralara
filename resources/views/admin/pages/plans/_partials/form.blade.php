
@include('admin.includes.alerts')

<div class="form-group">
    <label >Nome</label>
<input type="text" name="name" class="form-control" placeholder="Nome: do Plano" value="{{ $plan->name ??  old('name')}}" >
</div>

<div class="form-group">
    <label >Price</label> 
    <input type="number" name="price" class="form-control" placeholder="preco: do Plano" value="{{ $plan->price ??  old('price')  }}">
</div>

<div class="form-group">
    <label >Descricao</label>
    <input type="text" name="description" class="form-control ml-1" placeholder="Nome: do Plano" value="{{ $plan->description ??  old('description') }}">
</div>
<button type="submit" class="btn btn-dark">Cadastrar</button>