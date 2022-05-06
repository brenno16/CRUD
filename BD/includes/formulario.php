<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="POST">

        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" name="nome" value="<?=$obVaga?->nome?>">
        </div>

        <div class="form-group">
            <label for="">E-mail</label>
            <input type="text" class="form-control" name="email" value="<?=$obVaga?->email?>">
        </div>

        <div class="form-group">
            <label for="">Função</label>
            <input type="text" class="form-control" name="funcao" value="<?=$obVaga?->funcao?>">
        </div>

        <div class="form-group">
            <label for="">Telefone</label>
            <input type="text" class="form-control" name="telefone" value="<?=$obVaga?->telefone?>">
        </div>

        <div class="form-group">
            <label for="">Endereço</label>
            <input type="text" class="form-control" name="endereco" value="<?=$obVaga?->endereco?>">
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success">Enviar</button>

        </div>

    </form>

</main>