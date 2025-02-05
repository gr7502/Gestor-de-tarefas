<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Tarefa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/c'); ?>">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Visualizar Tarefa</h3>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $project['titulo']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="4" readonly><?= $project['descricao']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="data_vencimento">Data de Vencimento</label>
                    <input type="date" class="form-control" id="data_vencimento" name="data_vencimento" value="<?= $project['data_vencimento']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" name="status" value="<?= $project['status']; ?>" readonly>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="<?= base_url('projects/index'); ?>" class="btn btn-primary">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
