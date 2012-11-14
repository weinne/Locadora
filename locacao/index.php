<?php include_once '../includes/header.php'; ?>
<link rel="stylesheet" href="css/main.css" type="text/css">
<script src="<?php echo $UrlSite ?>/js/main.js"></script>
<script>
	pegaListBox('obra');
	pegaListBox('funcionario');
	pegaListBox('cliente');
</script>
</head>
<body>
	<ul class="menu">
		<li><a href="">Pessoa</a>
			<ul>
				<li><a href="<?php echo $UrlSite ?>pessoa/cliente.php"></span>Cliente</a></li>
				<li><a href="<?php echo $UrlSite ?>pessoa/funcionario.php"></span>Funcionário</a></li>
			</ul>
		</li>
		<li><a href="">Obras</a>
			<ul>
				<li><a href="<?php echo $UrlSite ?>obras/categoria.php">Categoria</a></li>
				<li><a href="<?php echo $UrlSite ?>obras/midia.php">Mídia</a></li>
				<li><a href="<?php echo $UrlSite ?>obras/rotulo.php">Rótulo</a></li>
				<li><a href="<?php echo $UrlSite ?>obras/tipomidia.php">Tipo de Mídia</a></li>
				<li><a href="<?php echo $UrlSite ?>obras/obra.php">Obra</a></li>
			</ul>
		</li>
		<li class="current"><a href="<?php echo $UrlSite ?>locacao/index.php">Locação</a>
	</ul>
	
	<h1>Locação</h1>

	<ul class="tabs left">
		<li><a href="#cad" id="linkCadastrar">Cadastrar</a></li>
		<li><a href="#alt" onClick="pegaListaAltera('locacao')">Devolver</a></li>
	</ul>

	<div class="tab-content" id="cad">
		<form name="FormObra" id="FormObra">
			<input type="hidden" name="Cod" id="Cod" />
			<label for="Obra"><span>Obra:</span>
				<select id="Obra" name="Obra">
				</select>
				<a class="button small" onClick="addObraLocacao()">adicionar</a>
			</label><br/>
			<label for="Funcionario"><span>Funcionario:</span>
				<select id="Funcionario" name="Funcionario">
				</select>
				<a class="button small">adicionar</a>
			</label><br/>
			<label for="Cliente"><span>Cliente:</span>
				<select id="Cliente" name="Cliente">
				</select>
				<a class="button small" >adicionar</a>
			</label><br/>
			<label>
				<span>.</span> 
				<input type="button" name="Enviar" id="Enviar" value="Salvar" onClick="cadastra('obra', 'FormObra');" />
			</label><br/>
		</form>
	</div>
	<div class="tab-content" id="alt">
		
	</div>
</body>