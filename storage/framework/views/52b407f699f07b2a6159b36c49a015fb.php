<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Listagem de Alunos</h3>
    <form action="<?php echo e(route('aluno.search')); ?>" method="post">
        <?php echo csrf_field(); ?> <!-- cria um hash de segurança -->
        <select name="tipo" >
            <option value="nome">Nome</option>
            <option value="data_nascimento">Data Nascimento</option>
            <option value="email">Email</option>
            <option value="cpf">CPF</option>
            <option value="telefone">Telefone</option>
        </select>
        <input type="text" name="valor">
        <button type="submit">Buscar</button>
        <a href="<?php echo e(route('aluno.create')); ?>">Cadastrar</a><br>
    </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data Nascimento</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        <?php $__currentLoopData = $alunos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->id); ?></td>
                <td><?php echo e($item->nome); ?></td>
                <td><?php echo e($item->data_nascimento); ?></td>
                <td><?php echo e($item->email); ?></td>
                <td><?php echo e($item->cpf); ?></td>
                <td><?php echo e($item->telefone); ?></td>
                <td><a href="<?php echo e(route('aluno.edit', $item->id)); ?>">Editar</a></td>
                <td><a href="<?php echo e(route('aluno.destroy', $item->id)); ?>"
                    onclick="return confirm('Deseja Excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</body>
</html>
<?php /**PATH C:\laragon\www\pweb2_laravel_2023_2-main\resources\views/aluno/list.blade.php ENDPATH**/ ?>