<?php 

    function verificaDados($conexao){

        if(!empty($_POST['email'])){

            $email = mysqli_real_escape_string($conexao, $_POST['email']);

            $sql = "SELECT * FROM vendedores WHERE email_vendedor = '$email'";
            $result = mysqli_query($conexao, $sql);
            $user = mysqli_fetch_assoc($result);
            $total = mysqli_num_rows($result);

            if($total > 0){

                echo "EMAIL EXISTE";

                //$dados = $user['email_vendedor'];
                //add_recupera($conexao, $dados);
                //enviarEmail($conexao, $dados);
                
            }else {
                echo "EMAIL NÃO EXISTE";
            }

        }
    }

    function add_recupera($conexao, $dados){
        $rash = md5(rand());
        $sql = "INSERT INTO recuperar (email, rash) VALUES ('$dados', '$rash')";
        $resultado = mysqli_query($conexao, $sql);
        
        if(mysqli_affected_rows($conexao)){
            enviarEmail($conexao, $dados);
        }
        
    }

    function enviarEmail($conexao, $dados){
        mail($dados, "Sua nova senha", "Minha senha é essa...");
    }

?>