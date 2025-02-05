<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Novo projeto</title>
    <!-- Link para o Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Link para o CSS personalizado -->
    <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>"> <!-- ou dentro de <style> -->
</head>
<body>
<div class="container">
    <h1 class="mt-4">Novo projeto</h1>
    
   
    <form action="<?= base_url('projects/store'); ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="data_vencimento">Vencimento</label>
            <input type="date" id="data_vencimento" name="data_vencimento" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control" required>
                <option value="Aberto">Aberto</option>
                <option value="Em progresso">Em progresso</option>
                <option value="Finalizado">Finalizado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="anexo">Anexar Arquivo</label>
            <input type="file" name="anexo[]" id="anexo" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="<?= base_url('projects/index'); ?>" class="btn btn-secondary ml-2">Voltar</a>
    </form>
</div>
</body>
</html>
