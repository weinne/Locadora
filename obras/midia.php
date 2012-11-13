<?php include_once '../includes/header.php'; ?>
<link rel="stylesheet" href="css/main.css" type="text/css">
<script src="<?php echo $UrlSite ?>/js/main.js"></script>
<script>
	pegaListBox('obra');
	pegaListBox('tipomidia');
</script>
</head>
<body>
	<ul class="menu">
		<li><a href="<?php echo $UrlSite ?>pessoa/index.php">Pessoa</a></li>
		<li class="current"><a href="">Obras</a>
			<ul>
				<li><a href="<?php echo $UrlSite ?>obras/categoria.php">Categoria</a></li>
				<li class="current"><a href="<?php echo $UrlSite ?>obras/midia.php">Mídia</a></li>
				<li><a href="<?php echo $UrlSite ?>obras/rotulo.php">Rótulo</a></li>
				<li><a href="<?php echo $UrlSite ?>obras/tipomidia.php">Tipo de Mídia</a></li>
				<li><a href="<?php echo $UrlSite ?>obras/obra.php">Obra</a></li>
			</ul>
		</li>
		<li><a href="<?php echo $UrlSite ?>locacao/index.php">Locação</a>
	</ul>
	
	<h1>Mídia</h1>

	<ul class="tabs left">
		<li><a href="#cad" id="linkCadastrar">Cadastrar</a></li>
		<li><a href="#alt" onClick="pegaListaAltera('midia')">Alterar</a></li>
	</ul>

	<div class="tab-content" id="cad">
		<form name="FormMidia" id="FormMidia">
			<input type="hidden" name="Cod" id="Cod" />
			<label>
				<span>Obra:</span>
				<select id="Obra" name="Obra">
				</select>
				<a class="button small red lightbox iframe" href="<?php echo $UrlSite ?>obras/obra.php">
					+
				</a>
			</label><br/>
			<label>
				<span>Tipo de Mídia:</span>
				<select id="TipoMidia" name="TipoMidia">
				</select>
				<a class="button small red lightbox iframe" href="<?php echo $UrlSite ?>obras/tipomidia.php">
					+
				</a>
			</label><br/>
			<label>
				<span>.</span> 
				<input type="button" name="Enviar" id="Enviar" value="Salvar" onClick="cadastra('midia', 'FormMidia');" />
			</label><br/>
		</form>
	</div>
	<div class="tab-content" id="alt">
		
	</div>
</body>