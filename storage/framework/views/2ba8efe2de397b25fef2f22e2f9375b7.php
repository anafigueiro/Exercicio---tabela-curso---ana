<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Listagem de Cursos</h3> 
    <form action="<?php echo e(route('curso.search')); ?>" method="post">
        <?php echo csrf_field(); ?> <!-- cria um hash de segurança -->
        <select name="tipo" >
            <option value="nome">Nome</option>
            <option value="requisito">Requisito</option>
            <option value="carga_horario">Carga_horario</option>
            <option value="valor">Valor</option>
        </select>
        <input type="text" name="campo">
        <button type="submit">Buscar</button>
        <a href="<?php echo e(route('curso.create')); ?>">Cadastrar</a><br>
    </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Requisito</th>
            <th>Carga horária</th>
            <th>Valor</th>
        </tr>
        <?php $__currentLoopData = $alunos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->id); ?></td>
                <td><?php echo e($item->nome); ?></td>
                <td><?php echo e($item->requisito); ?></td>
                <td><?php echo e($item->carga_horario); ?></td>
                <td><?php echo e($item->valor); ?></td>
                <td><a href="<?php echo e(route('curso.edit', $item->id)); ?>">Editar</a></td>
                <td><a href="<?php echo e(route('curso.destroy', $item->id)); ?>"
                    onclick="return confirm('Deseja Excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</body>
</html>
<?php /**PATH C:\laragon\www\pweb2_laravel_2023_2-main\resources\views/curso/list.blade.php ENDPATH**/ ?>