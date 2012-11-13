<?php include_once '../includes/header.php'; ?>
<link rel="stylesheet" href="css/main.css" type="text/css">
<script src="<?php echo $UrlSite ?>/js/main.js"></script>
<script>
	pegaListBox('categoria');
	pegaListBox('rotulo');
</script>
</head>
<body>
	<ul class="menu">
		<li><a href="<?php echo $UrlSite ?>pessoa/index.php">Pessoa</a></li>
		<li class="current"><a href="">Obras</a>
			<ul>
				<li><a href="<?php echo $UrlSite ?>obras/categoria.php">Categoria</a></li>
				<li><a href="<?php echo $UrlSite ?>obras/midia.php">Mídia</a></li>
				<li><a href="<?php echo $UrlSite ?>obras/rotulo.php">Rótulo</a></li>
				<li><a href="<?php echo $UrlSite ?>obras/tipomidia.php">Tipo de Mídia</a></li>
				<li class="current"><a href="<?php echo $UrlSite ?>obras/obra.php">Obra</a></li>
			</ul>
		</li>
		<li><a href="<?php echo $UrlSite ?>locacao/index.php">Locação</a>
	</ul>
	
	<h1>Obra</h1>

	<ul class="tabs left">
		<li><a href="#cad" id="linkCadastrar">Cadastrar</a></li>
		<li><a href="#alt" onClick="pegaListaAltera('obra')">Alterar</a></li>
	</ul>

	<div class="tab-content" id="cad">
		<form name="FormObra" id="FormObra">
			<input type="hidden" name="Cod" id="Cod" />
			<label>
				<span>Titulo:</span>
				<input type="text" name="Titulo" id="Titulo" placeholder="Título" />
			</label><br/>
			<label>
				<span>Descrição:</span>
				<textarea type="text" name="Descricao" id="Descricao" placeholder="Descrição"></textarea>
			</label><br/>
			<label>
				<span>Diretor:</span>
				<input type="text" name="Diretor" id="Diretor" placeholder="Diretor" />
			</label><br/>
			<label>
				<span>Categoria:</span>
				<select id="Categoria" name="Categoria">
				</select>
				<a class="button small green lightbox iframe adicionar" href="<?php echo $UrlSite ?>obras/categoria.php">
					adicionar
				</a>
			</label><br/>
			<label>
				<span>Rotulo:</span>
				<select id="Rotulo" name="Rotulo">
				</select>
				<a class="button small green lightbox iframe adicionar" href="<?php echo $UrlSite ?>obras/rotulo.php">
					adicionar
				</a>
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