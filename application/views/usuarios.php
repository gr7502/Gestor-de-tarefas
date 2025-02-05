<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    
    <!-- Bootstrap e Ícones -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="<?= base_url('assets/css/user.css'); ?>">
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="logo-container">
        <img src="<?= base_url('assets/imagens/logo.png'); ?>" class="logo" alt="logo">
    </div>

    <h3>Menu</h3>
    <ul class="sidebar-menu">
        <li><a href="<?= base_url('projects/index'); ?>"><i class="bi bi-house-door-fill"></i> Tarefas</a></li>
        <li><a href="<?= base_url('usuario/index'); ?>"><i class="bi bi-person-lines-fill"></i> Usuários</a></li>
        <li><a href="<?= base_url('usuario/create'); ?>"><i class="bi bi-person-fill-add"></i> Criar usuário</a></li>
        <li><a href="<?= base_url('auth/logout'); ?>" class="logout-btn"><i class="bi bi-box-arrow-right"></i> Sair</a></li>
    </ul>
</div>

<!-- Conteúdo -->
<div class="content">
    <h1>Lista de Usuários</h1>

    <div class="container mt-4">
        <!-- Botão flutuante para adicionar usuário -->
        <a href="<?= base_url('usuario/create'); ?>" class="btn add-user-btn"><i class="bi bi-person-plus"></i> Novo Usuário</a>

        <?php if (empty($usuarios)): ?>
            <div class="alert alert-warning text-center" role="alert">
                Nenhum usuário encontrado.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>CPF</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario) : ?>
                            <tr>
                                <td><?= htmlspecialchars($usuario['nome']); ?></td>
                                <td><?= htmlspecialchars($usuario['email']); ?></td>
                                <td><?= htmlspecialchars($usuario['cpf']); ?></td>
                                <td>
                                    <a href="<?= base_url('usuario/edit/' . $usuario['id']); ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="<?= base_url('usuario/delete/' . $usuario['id']); ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/js/script.js'); ?>"></script>

</body>
</html>
