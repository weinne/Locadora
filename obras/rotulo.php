<?php include_once '../includes/header.php'; ?>
<link rel="stylesheet" href="css/main.css" type="text/css">
<script src="<?php echo $UrlSite ?>/js/main.js"></script>
</head>
<body>
	<ul class="menu">
		<li><a href="<?php echo $UrlSite ?>pessoa/index.php">Pessoa</a></li>
		<li class="current"><a href="">Obras</a>
			<ul>
				<li class="current"><a href="<?php echo $UrlSite ?>obras/categoria.php">Categoria</a></li>
				<li><a href="<?php echo $UrlSite ?>obras/midia.php">Mídia</a></li>
				<li><a href="<?php echo $UrlSite ?>obras/rotulo.php">Rótulo</a></li>
				<li><a href="<?php echo $UrlSite ?>obras/tipomidia.php">Tipo de Mídia</a></li>
				<li><a href="<?php echo $UrlSite ?>obras/obra.php">Obra</a></li>
			</ul>
		</li>
		<li><a href="<?php echo $UrlSite ?>locacao/index.php">Locação</a>
	</ul>

	<h1>Rótulo</h1>
	<ul class="tabs left">
		<li><a href="#cad" id="linkCadastrar">Cadastrar</a></li>
		<li><a href="#alt" onClick="pegaListaAltera('rotulo')">Alterar</a></li>
	</ul>

	<div class="tab-content" id="cad">
		<form name="FormRotulo" id="FormRotulo">
			<input type="hidden" name="Cod" id="Cod" />
			<label>
				<span>Nome:</span>
				<input type="text" name="Nome" id="Nome" placeholder="Nome" />
			</label><br/>
			<label>
				<span>Descrição:</span>
				<textarea type="text" name="Descricao" id="Descricao" placeholder="Descrição"></textarea>
			</label><br/>
			<label>
				<span>Tempo de devolução:</span>
				<input type="text" name="TempoDevolucao" id="TempoDevolucao" placeholder="Tempo de devolução" class="input-tempo" />
			</label><br/>
			<label>
				<span>Preço:</span>
				<input type="text" name="Preco" id="Preco" placeholder="Preço" class="input-preco" />
			</label><br/>
			<label>
				<span>.</span> 
				<input type="button" name="Enviar" id="Enviar" value="Salvar" onClick="cadastra('rotulo', 'FormRotulo');" />
			</label><br/>
		</form>
	</div>
	<div class="tab-content" id="alt">
		
	</div>
</body>