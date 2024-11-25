<?php

/** 
 * Cadastro do cliente
 * 
 * Este arquivo contém todos os formularios relacionados ao cadastro do cliente
 * @author Luís Carlos  <luiscarlosantoa1235@gmail.com> e Maria Beatriz<@email>
 * 
 * @requires /conexao.php
 * @requires /testeLogin.php
 * @requires /operacoes.php
 * 
 */

require_once 'conexao.php';
require_once 'testeLogin.php';
require_once 'operacoes.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/jquery.validate.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
/** 
 * Este trecho verifica o valor de 'origem' enviado via URL (parâmetro GET).
 * Se a origem for igual a 1, a página exibirá um formulário para que o usuário escolha o tipo de cliente (físico ou jurídico).
 * 
 * - Se 'origem' for 1, exibe um formulário onde o usuário escolhe entre CPF (cliente físico) ou CNPJ (cliente jurídico).
 * - Após a escolha, o formulário será enviado com 'origem' alterado para 2, indicando a próxima etapa do cadastro.
 */
if ($_GET['origem'] == 1) {

echo '
    <body>
        <a href="home.php">home</a>

        <form id="formulario_cliente" action="cadastroCliente.php">

            <!-- Hidden == escondido. Serve para marcar a origem da página-->
            <input type="hidden" name="origem" value="2">

            Nome do cliente: <br>
            <input type="text" name="nome" id="nome"><br><br>
            <input type="radio" name="tipo" value="p" id="tipo1"><label for="tipo1">CPF</label>
            <input type="radio" name="tipo" value="e" id="tipo2"><label for="tipo2">CNPJ</label> <br><br>

            <input type="submit" value="&#10145;&#65039;">
        </form>
        <script>
            $(document).ready(function () {
                $("#formulario_cliente").validate({
                    rules: {
                        nome: {
                            required: true,
                            minlength: 2,
                            regex: /^[a-zA-ZáéíóúãõçÁÉÍÓÚÃÕÇ]+$/,
                        },
                        tipo: {
                            required: true,
                        },
                    },
                    messages: {
                        nome: {
                            required: "campo nome obrigatório.",
                            minlength: "O nome deve ter pelo menos 2 caracteres."
                        },
                        tipo: {
                            required: "Adicione um dos campus.",
                        },
                    }
                });
            });
        </script>
    </body>
</html>
';}

/**
 * Após o usuário selecionar o tipo de cliente (físico ou jurídico), 
 * a origem 3 determina qual formulário será exibido para o cadastro adicional de informações.
 * 
 * - Se 'origem' for igual a 3, o formulário será ajustado conforme o tipo de cliente selecionado (físico ou jurídico).
 * - Para clientes físicos ('tipo' = 'p'), serão solicitadas informações como CPF, CNH e endereço.
 * - Para clientes jurídicos ('tipo' = 'e'), serão solicitadas informações como CNPJ, responsável e endereço.
 */
elseif ($_GET['origem'] == 3) {
    if ($_GET['tipo'] == "p") {
        /** Para clientes físicos: exibe formulário para CPF, CNH e endereço */
        $tipo = $_GET['tipo'];

        $nome = $_GET['nome'];
        echo '
            <body>
            <a href="home.php">home</a>
                <form id="cadastroCliente" action="cadastroCliente.php">

                    <!-- Hidden == escondido. Serve para marcar a origem da página-->
                    <input type="hidden" name="origem" value="4">
                    <input type="hidden" name="tipo" value=' . $tipo . '>
                    <input type="hidden" name="nome_cliente" value=' . $nome . '>
                    <input type="hidden" name="tipo" value="p">

                    Cpf: <br>
                    <input type="text" name="cpf" id="cpf"><br><br>
                    Carteira de motorista: <br>
                    <input type="text" name="cnh" id="carteira"><br><br>
                    Endereço: <br>
                    <input type="text" name="endereco" id="endereco">

                    <input type="submit" value="Realizar pedido">
                </form>
            <script>
                    $(document).ready(function() {
                        $("#cadastroCliente").validate({
                            rules: {
                        cpf: {
                            required: true,
                            minlength: 8,
                            regex: /^[0-9-]+$/,
                        },
                        Carteira: {
                            required: true,
                            minlength: 8,
                            regex: /^[a-zA-ZáéíóúãõçÁÉÍÓÚÃÕÇ]+$/,
                        },
                        endereco: {
                            required: true,
                            minlength: 8,

                        }
                    },
                    messages: {
                        cpf: {
                            required: "campo cnpj obrigatório.",
                            minlength: "O cnpj deve conter pelo menos 5 caracteres."
                    },
                        carteira : {
                            required: "campo cnpj obrigatório.",
                            minlength: "O cnpj deve conter pelo menos 5 caracteres."
                    },
                        endereco: {
                            required: "campo cnpj obrigatório.",
                            minlength: "O cnpj deve conter pelo menos 5 caracteres."
    }
    }
    })
    })
    </script>

         
        ';
    }}
        // elseif ($_GET['tipo'] == "e") {
     ?>
        <!-- /** Para clientes jurídicos: exibe formulário para CNPJ, nome responsável e endereço */
        echo ' -->
            <body>
                |<br/>|<br/>|<br/>
            <a href="home.php">home</a>
                <form id='cadastroCliente' action="cadastroCliente.php">

                    <!-- Hidden == escondido. Serve para marcar a origem da página-->
                    <input type="hidden" name="origem" value="5">
                    <input type="hidden" name="tipo" value="e">

                    cnpj: <br>
                    <input type="text" name="cnpj" id="cnpj"><br><br>
                    funcionário responsável: <br>
                    <input type="text" name="funcionario" id="funcionario"> <br><br>
                    endereco: <br>
                    <input type="text" name="endereco" id="endereco"> <br><br>

                    <input type="submit" value="Realizar pedido">
                </form>
                <script>
                    $(document).ready(function() {
                        $("#cadastroCliente").validate({
                            rules: {
                                cnpj: {
                                    required: true,
                                    minlength: 5,
                                    regex: /^[0-9-]+$/,
                                },
                                funcionario: {
                                    required: true,
                                    minlength: 5,
                                    regex: /^[a-zA-ZáéíóúãõçÁÉÍÓÚÃÕÇ]+$/,
                                },
                                endereco: {
                                    required:true,
                                    minlength: 5,
                                
                                },
                            },
                        messages: {
                        cnpj: {
                            required: "campo cnpj obrigatório.",
                            minlength: "O cnpj deve conter pelo menos 5 caracteres."
                        },
                        funcionario: {
                            required: "campo funcionario obrigatório.",
                            minlength: "O funcionario deve conter pelo menos 5 caracteres."
                        },
                        endereco: {
                            required: "campo endereço obrigatório.",
                            minlength: "O endereço deve conter pelo menos 5 caracteres." 
                        },
                    }
              }),
              $.validator.addMethod("regex", function(value, element, regexp) {
                return this.optional(element) || regexp.test(value);
            }, "Por favor, insira um valor válido.");
            //$.validator.addMethod("regex", ...): Cria uma nova regra de validação chamada regex, que pode ser usada em campos do formulário.
            //value: O valor do campo.
            //element: O próprio campo de entrada.
            //regexp: A expressão regular a ser usada para validar o valor.
            //this.optional(element): Retorna true se o campo for opcional (ou seja, vazio e não obrigatório), permitindo que o campo seja considerado válido se não for preenchido.
            //regexp.test(value): Verifica se o valor do campo corresponde à expressão regular fornecida.
            //Este código cria uma validação personalizada no jQuery, onde você pode aplicar uma expressão regular em um campo e validar seu conteúdo.
            // Se a expressão regular não corresponder, o formulário exibirá uma mensagem de erro personalizada
            })
            </script>                
</body>
</html>
    