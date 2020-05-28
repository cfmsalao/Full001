<?php require 'config.php'; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
	<title>Salao Aberto</title>
        
        <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″>
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no"/>
	<link rel="stylesheet" href="assets/css/bootstrap.css" />
	<link rel="stylesheet" href="assets/css/style.css" />
	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>
  <script type="text/javascript">
			function limpa_formulário_cep() {
					//Limpa valores do formulário de cep.
					document.getElementById('rua').value=("");
					document.getElementById('bairro').value=("");
					document.getElementById('cidade').value=("");
					document.getElementById('uf').value=("");
					document.getElementById('ibge').value=("");
			}

			function meu_callback(conteudo) {
				if (!("erro" in conteudo)) {
					//Atualiza os campos com os valores.
					document.getElementById('rua').value=(conteudo.logradouro);
					document.getElementById('bairro').value=(conteudo.bairro);
					document.getElementById('cidade').value=(conteudo.localidade);
					document.getElementById('uf').value=(conteudo.uf);
					document.getElementById('ibge').value=(conteudo.ibge);
				} //end if.
				else {
					//CEP não Encontrado.
					limpa_formulário_cep();
					alert("CEP não encontrado.");
				}
			}
				
			function pesquisacep(valor) {

				//Nova variável "cep" somente com dígitos.
				var cep = valor.replace(/\D/g, '');

				//Verifica se campo cep possui valor informado.
				if (cep != "") {

					//Expressão regular para validar o CEP.
					var validacep = /^[0-9]{8}$/;

					//Valida o formato do CEP.
					if(validacep.test(cep)) {

						//Preenche os campos com "..." enquanto consulta webservice.
						document.getElementById('rua').value="...";
						document.getElementById('bairro').value="...";
						document.getElementById('cidade').value="...";
						document.getElementById('uf').value="...";
						document.getElementById('ibge').value="...";

						//Cria um elemento javascript.
						var script = document.createElement('script');

						//Sincroniza com o callback.
						script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

						//Insere script no documento e carrega o conteúdo.
						document.body.appendChild(script);

					} //end if.
					else {
						//cep é inválido.
						limpa_formulário_cep();
						alert("Formato de CEP inválido.");
					}
				} //end if.
				else {
					//cep sem valor, limpa formulário.
					limpa_formulário_cep();
				}
			};

    </script>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color:#1F1CB0">
        <a class="navbar-brand" href="./"><img src="assets/images/salaoaberto.jpg" alt="SALAO ABERTO" width=200 height=40 /></a>
     
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            
            
          
          <ul class="navbar-nav">
              
                        <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
                                <a href="contato.php" class="nav-item nav-link active">Contato</a>
                                 <a href="meus-anuncios.php" class="nav-item nav-link active">Meus Anúncios</a>
                                   <a href="sair.php" class="nav-item nav-link ">Sair</a>
                                  <a href="fornecedor.php" class="nav-item nav-link disabled">Fornecedor em Breve</a>
                               
                                            <?php else: ?>      
                                  <li><a href="fornecedore.php" class="nav-item nav-link disabled">Fornecedores em Breve</a></li>
                                   <a href="contato.php" class="nav-item nav-link active">Contato</a>
                                   <li><a href="cadastre-se.php" class="nav-item nav-link active">Cadastre-se</a></li>                                    
                                   <li><a href="login.php" class="nav-item nav-link active">Login</a></li>
                                  <?php endif; ?>
                                      
                            </ul>        
          
        </ul>
        <span class="navbar-nav navbar-nav navbar-right">
                             Os Melhores Salões do Brasil.
                        </span>
             
      </div>
    </nav>
    
