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

if(isset($_SESSION['mensagem_erro'])){ ?>

    <script>
        window.onload = function(){
            M.toast({html: '<?php echo $_SESSION['mensagem_erro']; ?>', classes: 'color: red accent-4'});
        };
    </script>
    
    <?php
    }

session_unset();

?>