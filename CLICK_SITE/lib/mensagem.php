<?php 

session_start();

if(isset($_SESSION['mensagem_sucesso'])){ ?>

<script>
    window.onload = function(){
        M.toast({html: '<?php echo $_SESSION['mensagem_sucesso']; ?>', classes: 'color:  green darken-4'});
    };
</script>

<?php

}

unset($_SESSION['mensagem_sucesso']);

if(isset($_SESSION['mensagem_erro'])){ ?>

    <script>
        window.onload = function(){
            M.toast({html: '<?php echo $_SESSION['mensagem_erro']; ?>', classes: 'color: red accent-4'});
        };
    </script>
    
    <?php
    
    }
    unset($_SESSION['mensagem_erro']);
?>