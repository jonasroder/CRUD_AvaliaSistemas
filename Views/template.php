<!DOCTYPE html>
<html>

<head>
	<title>Avalia</title>


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="Controllers/postController.js"></script>

</head>

<body>

	<header>
		<nav class="navbar navbar-expand-lg bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Avalia</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">

					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
						</li>
					</ul>
					<form class="d-flex pull-right" role="search" onsubmit="event.preventDefault(); buscar();">
						<input id="busca" class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
						<button class="btn btn-outline-success" type="submit">Buscar</button>
					</form>
				</div>
			</div>
		</nav>
	</header>

	<main>
		<div class="container mt-5">
			<div class="title">
				<div class="row d-flex">
					<div class="col-sm-6">
						<h2>Listar <b>Carros</b></h2>
					</div>
					<div class="col-sm-6" style="text-align: right">
						<button id="apagarcarros" type="button" class="btn btn-danger" style="display:none" onclick="deleteMany()">
							Apagar carros
						</button>

						<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addcarro" onclick="$('#adicionar')[0].reset()">
							Adicionar carro
						</button>
					</div>
				</div>
			</div>

			<div id="carros" class="list-group mx-0 w-auto mt-5">

			</div>

		</div>

		<?php require_once('./Views/veiculos.php'); ?>

		<script>
			var read = () => {
				$.ajax({
					url: "/CRUD_AvaliaSistemas/veiculos/read",
					method: "POST",
				}).done(function(data) {

					$('#carros').html('');
					console.log(data);
					if (data != 'false') {
						data = JSON.parse(data);
						data.map((carro) => {
							$('#carros').append(`
								<div  onclick="edit(` + carro.idveiculos + `)" class="list-group-item d-flex gap-2 pointer" id="carro` + carro.idveiculos + `">
									<input class="form-check-input flex-shrink-0" type="checkbox" value="` + carro.idveiculos + `" onclick="check()">
									<div> 
										<span>` + carro.nome + ` / ` + carro.ano + `<small class="d-block text-muted">` + carro.marca + `</small></span>
									</div>
									<span class="price bold"><b>R$ ` + parseInt(carro.valorvenda).toLocaleString('pt-BR') + `</b></span>
								</div>
							`);
						});
					} else {
						$('#carros').append(`
							<div class="d-flex gap-2 align-self-center" style="color: #a9a7a7;">
								<h1>Nenhum veículo encontrado</h1>
							</div>
						`);
					}
				});
			}

			read();

			var buscar = () => {
				$.ajax({
					url: "/CRUD_AvaliaSistemas/veiculos/read",
					method: "POST",
					data: {
						busca: $("#busca").val()
					}
				}).done(function(data) {
					data = JSON.parse(data);
					$('#carros').html('');
					if (data.length) {

						data.map((carro) => {
							$('#carros').append(`
								<div  onclick="edit(` + carro.idveiculos + `)" class="list-group-item d-flex gap-2 pointer" id="carro` + carro.idveiculos + `">
									<input class="form-check-input flex-shrink-0" type="checkbox" value="` + carro.idveiculos + `" onclick="check()">
									<div> 
										<span>` + carro.nome + ` / ` + carro.ano + `<small class="d-block text-muted">` + carro.marca + `</small></span>
									</div>
									<span class="price bold"><b>R$ ` + parseInt(carro.valorvenda).toLocaleString('pt-BR') + `</b></span>
								</div>
							`);
						});
					} else {
						$('#carros').append(`
							<div class="d-flex gap-2 align-self-center" style="color: #a9a7a7;">
								<h1>Nenhum veículo encontrado</h1>
							</div>
						`);
					}
				});
			}

			var create = () => {
				$.ajax({
					url: "/CRUD_AvaliaSistemas/veiculos/create",
					method: "POST",
					data: $('#adicionar').serialize()
				}).done(function(data) {
					if (data) {
						read();
					}
				});
			}

			var edit = (id) => {
				$.ajax({
					url: "/CRUD_AvaliaSistemas/veiculos/read",
					method: "POST",
					data: {
						id: id
					}
				}).done(function(data) {
					if (data) {
						data = JSON.parse(data)[0];
						$('#editar_idveiculos').val(parseInt(data.idveiculos));
						$('#editar_nome').val(data.nome);
						$('#editar_marca').val(data.marca);
						$('#editar_ano').val(data.ano);
						$('#editar_valorvenda').val(parseInt(data.valorvenda));

						$('#editcarro').modal('show');
					}
				});
			}

			var update = () => {
				$.ajax({
					url: "/CRUD_AvaliaSistemas/veiculos/update",
					method: "POST",
					data: $('#editar').serialize()
				}).done(function(data) {
					if (data) {
						read();
					}
				});
			}

			var deleteOne = (id) => {
				$.ajax({
					url: `/CRUD_AvaliaSistemas/veiculos/delete/${id}`,
				}).done(function(data) {
					if (data) {
						$("#carro" + id).fadeOut("slow", () => {
							$("#carro" + id).remove()
						});
						buscar();
						check();
					}
				});
			}

			var deleteMany = () => {
				$('input:checked').each(function() {
					deleteOne($(this).val());
					buscar();
					check();
				});
			}

			var check = () => {
				console.log('change');
				if ($('input:checked').length > 0) {
					$('#apagarcarros').fadeIn("ease");
				} else {
					$('#apagarcarros').fadeOut("ease");
				}

				event.stopPropagation();
			}
		</script>
	</main>
	<style type="text/css">
		.form-check-input,
		.price {
			align-self: center;
			padding: 8px;
			margin-right: 8px;
		}

		.price {
			right: 30px;
			position: absolute;
		}

		.list-group-item:hover {
			background-color: #e9e9e9;
		}

		.pointer:hover {
			cursor: pointer;
		}
	</style>

</body>

</html>