<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/create.css'); ?>">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Editar Tarefa</h3>
        </div>
        <div class="card-body">
        <form action="<?= base_url('projects/edit/' . $project['id']); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?= isset($project['titulo']) ? $project['titulo'] : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="4" required><?= isset($project['descricao']) ? $project['descricao'] : ''; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="data_vencimento">Data de Vencimento</label>
                    <input type="date" class="form-control" id="data_vencimento" name="data_vencimento" value="<?= isset($project['data_vencimento']) ? $project['data_vencimento'] : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Pendente" <?= ($project['status'] == 'Pendente') ? 'selected' : ''; ?>>Pendente</option>
                        <option value="Em andamento" <?= ($project['status'] == 'Em andamento') ? 'selected' : ''; ?>>Em andamento</option>
                        <option value="Finalizado" <?= ($project['status'] == 'Finalizado') ? 'selected' : ''; ?>>Concluído</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Arquivos anexados</label>
                    <?php if (!empty($arquivos)): ?>
                        <ul>
                            <?php foreach ($arquivos as $arquivo): ?>
                                <li>
                                    <a href="<?= base_url($arquivo['caminho_arquivo']); ?>" target="_blank">
                                        <?= $arquivo['nome_arquivo']; ?>
                                    </a>
                                    <a href="<?= base_url('projects/delete_file/' . $arquivo['id']); ?>" class="btn btn-danger btn-sm">Excluir</a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>Sem arquivos anexados.</p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="anexo">Adicionar novos arquivos</label>
                    <input type="file" name="anexo[]" id="anexo" class="form-control" multiple>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('projects/index'); ?>" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
