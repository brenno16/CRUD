<?php

    $mensagem = '';
    if(isset($_GET['status'])){
        switch ($_GET['status']) {
            case 'success':
                $mensagem = '<div class = "alert alert-success">Ação executado com sucesso!</div>';
                break;

                case 'error':
                    $mensagem = '<div class = "alert alert-danger">Ação não executada</div>';
                    break;
        }
    }

    $resultados = '';
    foreach($vagas as $vaga){
        $resultados .= '<tr>
                            <td>'.$vaga-> id. '</td>
                            <td>'.$vaga-> nome. '</td>
                            <td>'.$vaga-> email. '</td>
                            <td>'.$vaga-> funcao. '</td>
                            <td>'.$vaga-> telefone. '</td>
                            <td>'.$vaga-> endereco. '</td>
                            <td>
                                <a href="editar.php?id='.$vaga->id.'">
                                    <button type = "button" class = "bnt btn-primary">Editar</button>
                                </a>
                                <a href="excluir.php?id='.$vaga->id.'">
                                    <button type = "button" class = "bnt btn-danger">Excluir</button>
                                </a>
                            </td>
                        </tr>';
    }

    $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                                 Nenhuma vaga encontrada
                                                       </td>
                                                    </tr>';

?>

<main>

    <?=$mensagem?>

    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">Novo Funcionario</button>
        </a>
    </section>

    <section>

        <table class="table bg-light mt-3">
            <thead>

                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Função</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
            </tbody>

        </table>

    </section>

</main>