<?php include_once 'includes/header.php'; ?>
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
				<li><a href="<?php echo $UrlSite ?>obras/categoria.php"></span>Categoria</a></li>
				<li><a href="<?php echo $UrlSite ?>obras/midia.php"></span>Mídia</a></li>
				<li><a href="<?php echo $UrlSite ?>obras/rotulo.php"></span>Rótulo</a></li>
				<li><a href="<?php echo $UrlSite ?>obras/tipomidia.php"></span>Tipo de Mídia</a></li>
				<li><a href="<?php echo $UrlSite ?>obras/obra.php"></span>Obra</a></li>
			</ul>
		</li>
		<li><a href="<?php echo $UrlSite ?>locacao/index.php">Locação</a>
	</ul>
	<div class="headline">
		<h1>Bem vindo!</h1>
		<p>Este é um sistema de locadora, feito para a disciplina de Programação Web.</p>
	</div><!-- END WELCOME -->
</body>