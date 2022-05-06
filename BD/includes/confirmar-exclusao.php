<main>

    <h2 class="mt-3">Apagar Funcionario</h2>

    <form method="POST">

        <div class="form-group">
            <p>Você deseja relmente apagar os dados desse funcionario <strong><?=$obVaga->nome?></strong>?</p>   
        </div>       

        <div class="form-group mt-3">
        <a href="index.php">
            <button type="button" class="btn btn-success">Cancelar</button>
        </a>

            <button type="submit" name = "excluir" class="btn btn-danger">Excluir</button>

        </div>

    </form>

</main>