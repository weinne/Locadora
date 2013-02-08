<?php include_once '../includes/header.php'; ?>
<link rel="stylesheet" href="css/main.css" type="text/css">
<script src="<?php echo $UrlSite ?>/js/main.js"></script>
</head>
<body>
	<ul class="menu nav">
		<li class="current"><a href="">Pessoa</a>
			<ul>
				<li><a href="<?php echo $UrlSite ?>pessoa/cliente.php"></span>Cliente</a></li>
				<li class="current"><a href="<?php echo $UrlSite ?>pessoa/funcionario.php"></span>Funcionário</a></li>
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
	
	<h1>Pessoa</h1>
	<ul class="tabs left">
		<li><a href="#cad" id="linkCadastrar">Cadastrar</a></li>
		<li><a href="#alt" onClick="pegaListaAltera('pessoa')">Alterar</a></li>
	</ul>

	<div class="tab-content" id="cad">
		<form name="FormPessoa" id="FormPessoa">
			<input type="hidden" name="Cod" id="Cod" />
			<label>
				<span>Nome:</span>
				<input type="text" name="Nome" id="Nome" placeholder="Nome" />
			</label><br/>
			<label>
				<span>Data de Nascimento:</span> 
				<input type="text" name="DataNasc" id="DataNasc" class="input-data" placeholder="Data de Nascimento" />
			</label><br/>
			<label>
				<span>CPF:</span> 
				<input type="text" name="CPF" id="CPF" class="input-cpf" placeholder="CPF" />
			</label><br/>
			<label>
				<span>Telefone:</span> 
				<input type="text" name="Telefone" id="Telefone" class="input-telefone" placeholder="Telefone" />
			</label><br/>
			<label>
				<span>.</span> 
				<input type="button" name="Enviar" id="Enviar" value="Salvar" onClick="cadastra('pessoa', 'FormPessoa');" />
			</label><br/>
		</form>
	</div>
	<div class="tab-content" id="alt">
		
	</div>
</body>