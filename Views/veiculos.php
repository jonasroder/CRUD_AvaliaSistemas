<!-- Edit Modal HTML -->

<div class="modal" tabindex="-1" id="addcarro">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Adicionar veículo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
        	<form id="adicionar" action="/CRUD_AvaliaSistemas/veiculos/create" method="POST">        		
	        	 <div class="mb-3">
					<label class="form-label">Modelo</label>
					<input name="nome"  type="text" class="form-control" required>
				</div>

				<div class="mb-3">
					<label class="form-label">Marca</label>
					<input name="marca"  type="text" class="form-control" required>
				</div>

				<div class="mb-3">
					<label class="form-label">Ano</label>
					<input name="ano"  class="form-control" type="number" required></input>
				</div>
				
				<div class="mt-3">
					<label class="form-label">Valor de venda</label>
					<div class="input-group mt-1 mb-3">
					  <span class="input-group-text">R$</span>
					  <input name="valorvenda" class="form-control" aria-label="Digite o valor de venda" type="number" value="">
					  <span class="input-group-text">.00</span>
					</div>
				</div>
			</form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-danger"data-bs-dismiss="modal" onclick="create()">Salvar</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal HTML -->
<div class="modal" tabindex="-1" id="editcarro">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar veículo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
        	<form id="editar" action="/CRUD_AvaliaSistemas/veiculos/create" method="POST">    
        		<input id="editar_idveiculos" name="idveiculos" type="hidden" required value="0">
	        	<div class="mb-3">
					<label class="form-label">Modelo</label>
					<input id="editar_nome" name="nome"  type="text" class="form-control" required>
				</div>

				<div class="mb-3">
					<label class="form-label">Marca</label>
					<input id="editar_marca" name="marca"  type="text" class="form-control" required>
				</div>

				<div class="mb-3">
					<label class="form-label">Ano</label>
					<input id="editar_ano" name="ano"  class="form-control" type="number" required></input>
				</div>
				
				<div class="mt-3">
					<label class="form-label">Valor de venda</label>
					<div class="input-group mt-1 mb-3">
					  <span class="input-group-text">R$</span>
					  <input id="editar_valorvenda" name="valorvenda" class="form-control" aria-label="Digite o valor de venda" type="number" value="">
					  <span class="input-group-text">.00</span>
					</div>
				</div>
			</form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-danger"data-bs-dismiss="modal" onclick="update()">Salvar</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	let jsonDados = ''
</script>