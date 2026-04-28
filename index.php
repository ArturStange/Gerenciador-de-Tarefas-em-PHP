<?php
// FRAMEWORK ESCOLHIDO: Bootstrap 5
// IMPORTADO EM: header.php (via CDN: https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css)

session_start();
if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

require 'conexao.php';

$stmt = $pdo->prepare("SELECT * FROM tarefas WHERE usuario_id = ? ORDER BY id DESC");
$stmt->execute([$_SESSION["usuario_id"]]);
$tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Minhas Tarefas</h2>
    <a href="nova.php" class="btn btn-success">+ Nova Tarefa</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Título</th>
                    <th>Status</th>
                    <th>Data de Criação</th>
                    <th class="text-end">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tarefas as $t): ?>
                <tr>
                    <td><?= htmlspecialchars($t['titulo']) ?></td>
                    <td>
                        <?php if ($t['status'] == 'concluida'): ?>
                            <span class="badge bg-success">Concluída</span>
                        <?php else: ?>
                            <span class="badge bg-warning text-dark">Pendente</span>
                        <?php endif; ?>
                    </td>
                    <td><?= date('d/m/Y H:i', strtotime($t['data_criacao'])) ?></td>
                    <td class="text-end">
                        <?php if ($t['status'] == 'pendente'): ?>
                            <a href="concluir.php?id=<?= $t['id'] ?>" class="btn btn-sm btn-outline-success">Concluir</a>
                        <?php endif; ?>
                        <a href="editar.php?id=<?= $t['id'] ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                        <a href="excluir.php?id=<?= $t['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                
                <?php if (count($tarefas) == 0): ?>
                <tr>
                    <td colspan="4" class="text-center py-4 text-muted">Nenhuma tarefa encontrada.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require 'footer.php'; ?>