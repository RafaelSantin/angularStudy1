<body ng-controller="mensagemController">
	<div class="container" ng-init="listar()">
		<div class="row">
			<div class="col-md-12">
				<h1>Mensagens</h1>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-4">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Nova Mensagem</button>
			</div>
			<div class="col-md-4">				
				<button type="button" class="btn btn-success" ng-click="listarTodos()">Exibir todas mensagens</button>
			</div>			
			<div class="col-md-4">
				<a type="button" class="btn btn-info" ng-href="/">Voltar</a>
			</div>	
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Usuario</th>
							<th>Mensagem</th>
							<th>Data de Envio</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="mensagem in mensagens | filter: pesquisar">
							<td>@{{mensagem.id}}</td>
							<td>@{{mensagem.nome}}</td>
							<td>@{{mensagem.mensagem_text}}</td>
							<td>@{{mensagem.data_envio}}</td>
							<td>
								<button class="btn btn-info btn-xs" ng-click="editar(pessoa)">Editar</button>
								<button class="btn btn-danger btn-xs" ng-click="excluir(pessoa)">Excluir</button>

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
					<div class="form-group">
						<label>Mensagem:</label>
						<textarea class="form-control" ng-model="mensagem.mensagem_text"> </textarea>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" ng-click="pessoa = {}">Cancelar</button>
					<button type="button" class="btn btn-primary" ng-click="salvar()">Salvar</button>
				</div>
			</div>
		</div>
	</div>
</body>