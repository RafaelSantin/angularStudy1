<div ng-controller="pessoaController">
	<div class="container" ng-init="listar()">
		<div class="row">
			<div class="col-md-12">
				<h1>Cadastro de Pessoas</h1>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Nova Pessoa</button>
			</div>
			<div class="col-md-6">
				<input class="form-control" ng-model="pesquisar">
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Nome</th>
							<th>E-mail</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="pessoa in pessoas | filter: pesquisar">
							<td>@{{pessoa.id}}</td>
							<td>@{{pessoa.nome}}</td>
							<td>@{{pessoa.email}}</td>
							<td>
								<button class="btn btn-info btn-xs" ng-click="editar(pessoa)">Editar</button>
								<button class="btn btn-danger btn-xs" ng-click="excluir(pessoa)">Excluir</button>
								<a class="btn btn-info btn-xs" ng-href="/telamensagens/@{{pessoa.id}}">Mensagens</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Cadastro de Pessoa</h4>
				</div>
				<div class="modal-body ">
					<div class="row">
						<div class="form-group col-md-12">
							<label>Nome:</label>
							<input type="text" class="form-control" ng-model="pessoa.nome">
						</div>
						<div class="form-group col-md-12">
							<label>E-mail:</label>
							<input type="email" class="form-control" ng-model="pessoa.email">
						</div>
						<div class="form-group col-md-4">
							<label>Data Nascimento:</label>
							<input type="text" class="form-control" ng-model="pessoa.dat_nasc">
						</div>
						<div class="form-group col-md-4">
							<label>Telefone Residencial:</label>
							<input type="text" class="form-control" ng-model="pessoa.telefone">
						</div>
						<div class="form-group col-md-4">
							<label>Cep:</label>
							<input type="text" class="form-control" ng-model="pessoa.cep" ng-blur="carregaEndereco(pessoa)">
						</div>
						<div class="form-group col-md-10">
							<label>Logradouro:</label>
							<input type="text" class="form-control" ng-model="pessoa.logradouro">
						</div>
						<div class="form-group col-md-2">
							<label>Estado:</label>
							<input type="text" class="form-control" ng-model="pessoa.uf">
						</div>
						<div class="form-group col-md-4">
							<label>Bairro:</label>
							<input type="text" class="form-control" ng-model="pessoa.bairro">
						</div>						
						<div class="form-group col-md-4">
							<label>Cidade:</label>
							<input type="text" class="form-control" ng-model="pessoa.cidade">
						</div>
						<div class="form-group col-md-4">
							<label>Complemento:</label>
							<input type="text" class="form-control" ng-model="pessoa.complemento">
						</div>
						
						<div class="form-group col-md-12">
							<label>Biografia:</label>
							<textarea class="form-control" ng-model="pessoa.biografia"> </textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" ng-click="pessoa = {}">Cancelar</button>
					<button type="button" class="btn btn-primary" ng-click="salvar()">Salvar</button>
				</div>
			</div>
		</div>
	</div>	
</div>
