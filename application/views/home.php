<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Projetos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/user.css'); ?>">
</head>
<body>

<div class="sidebar">
    <div class="logo-container">
        <img src="<?= base_url('assets/imagens/logo.png'); ?>" class="logo" alt="Logo">
    </div>
    <h3>Menu</h3>
    <ul class="sidebar-menu">
        <li><a href="<?= base_url('projects/index'); ?>"><i class="bi bi-house-door-fill"></i> Tarefas</a></li>
        <li><a href="<?= base_url('usuario/index'); ?>"><i class="bi bi-person-lines-fill"></i> Usuários</a></li>
        <li><a href="<?= base_url('usuario/create'); ?>"><i class="bi bi-person-fill-add"></i> Criar usuário</a></li>
        <li><a href="<?= base_url('auth/logout'); ?>" class="logout-btn"><i class="bi bi-box-arrow-right"></i> Sair</a></li>
    </ul>

</div>

<!-- Botão para abrir o menu -->
<button id="toggleMenu" class="toggle-btn"><i class="bi bi-list"></i></button>

<div class="content">
    <header>
        <h1>Gestor de Projetos</h1>
        <form action="<?= base_url('projects/index'); ?>" method="GET" class="mt-4 mb-3">
            <div class="form-row">
                <div class="col-md-3">
                    <input type="text" name="id" class="form-control" placeholder="Filtrar por ID" value="<?= isset($_GET['id']) ? $_GET['id'] : ''; ?>">
                </div>
                <div class="col-md-3">
                    <input type="date" name="data_vencimento" class="form-control" value="<?= isset($_GET['data_vencimento']) ? $_GET['data_vencimento'] : ''; ?>">
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-control">
                        <option value="">Filtrar por Status</option>
                        <option value="Pendente" <?= isset($_GET['status']) && $_GET['status'] == 'Pendente' ? 'selected' : ''; ?>>Pendente</option>
                        <option value="Em andamento" <?= isset($_GET['status']) && $_GET['status'] == 'Em andamento' ? 'selected' : ''; ?>>Em andamento</option>
                        <option value="Finalizado" <?= isset($_GET['status']) && $_GET['status'] == 'Finalizado' ? 'selected' : ''; ?>>Finalizado</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                </div>
            </div>
        </form>
    </header>

    <a href="<?= base_url('projects/create'); ?>" class="btn btn-primary mb-3">Nova Tarefa</a>

    <?php if (empty($tarefas)): ?>
        <p class="alert alert-warning">Não existem tarefas cadastradas.</p>
    <?php else: ?>
        <table class="table table-striped table-hover table-bordered">
            <thead class="thead-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Data Vencimento</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tarefas as $tarefa): ?>
                <tr class="text-center">
                    <td><?= $tarefa['id']; ?></td>
                    <td><?= $tarefa['titulo']; ?></td>
                    <td><?= date('d/m/Y', strtotime($tarefa['data_vencimento'])); ?></td>
                    <td><?= $tarefa['status']; ?></td>
                    <td>
                        <a href="<?= base_url('projects/view/' . $tarefa['id']); ?>" class="btn btn-info btn-sm"><i class="bi bi-eye-fill"></i></a>
                        <a href="<?= base_url('projects/edit/' . $tarefa['id']); ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <a href="<?= base_url('projects/delete/' . $tarefa['id']); ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<script>
    document.getElementById("toggleMenu").addEventListener("click", function () {
        document.querySelector(".sidebar").classList.add("show");
    });

    document.getElementById("closeMenu").addEventListener("click", function () {
        document.querySelector(".sidebar").classList.remove("show");
    });
</script>

</body>
</html>
