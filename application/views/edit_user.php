<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Editar Usuário</h2>

    <form action="<?= base_url('usuario/update/' . $usuario['id']); ?>" method="post">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= $usuario['nome']; ?>" required>
        </div>

        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="<?= $usuario['endereco']; ?>">
        </div>

        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $usuario['cpf']; ?>" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $usuario['email']; ?>" required>
        </div>

        <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text" class="form-control" id="celular" name="celular" value="<?= $usuario['celular']; ?>">
        </div>

        <div class="form-group">
            <label for="senha">Nova Senha (deixe em branco para manter a atual)</label>
            <input type="password" class="form-control" id="senha" name="senha">
        </div>

        <div class="form-group">
            <label for="confirmar_senha">Confirmar Nova Senha</label>
            <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha">
        </div>

        <button type="submit" class="btn btn-success">Salvar Alterações</button>
        <a href="<?= base_url('usuario/index'); ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script>
    document.querySelector("form").addEventListener("submit", function(event) {
        let senha = document.getElementById("senha").value;
        let confirmarSenha = document.getElementById("confirmar_senha").value;

        if (senha !== "" && senha !== confirmarSenha) {
            event.preventDefault();
            alert("As senhas não coincidem!");
        }
    });
</script>

</body>
</html>
