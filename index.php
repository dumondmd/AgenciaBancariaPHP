<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Projeto Banco</title>
    </head>
    <body>
        <pre>
            <?php
            require_once 'ContaBanco.php';
            $p1 = new ContaBanco();
            $p1->abrirConta("CC");
            $p1->setNumConta(111);
            $p1->setDono("Dumon");
            
            $p2 = new ContaBanco();
            $p2->abrirConta("CP");
            $p2->setNumConta(222);
            $p2->setDono("Renato");

            //Deposito
            $p1->depositar(300.0);            
            $p2->depositar(500.0);
            //Saque
            $p1->sacar(338);
            $p2->sacar(630);
            
            //Pagar mensalidade
            $p1->pagarMensal();
            $p2->pagarMensal();
            
            //Fechar conta
            $p1->fecharConta();
            $p2->fecharConta();
            
            print_r($p1);

            print_r($p2);
            ?>
        </pre>
    </body>
</html>
