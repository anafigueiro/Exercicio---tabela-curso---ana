<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário Curso</title>
</head>
<body>
    <h3>Formulário de Curso</h3>
    <?php if($errors->any()): ?>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
    <?php
       // dd($); // é igual ao var_dump()
        if(!empty($c->id)){
          $route = route('curso.update', $curso->id);
        } else {
          $route = route('curso.store');
        }
    ?>
    <form action="<?php echo e($route); ?>" method="post">
        <?php echo csrf_field(); ?> <!-- cria um hash de segurança -->

        <?php if(!empty($curso->id)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>
        <input type="hidden" name="id" value="<?php if(!empty($curso->id)): ?><?php echo e($curso->id); ?><?php elseif(!empty(old('id'))): ?><?php echo e(old('id')); ?><?php else: ?><?php echo e(''); ?><?php endif; ?>">
        <label for="">Nome</label><br>
        <input type="text" name="nome"
            value="<?php if(!empty($curso->nome)): ?> <?php echo e($curso->nome); ?> <?php elseif(!empty(old('nome'))): ?> <?php echo e(old('nome')); ?> <?php else: ?> <?php echo e(''); ?> <?php endif; ?>">
        <br><br>
        <label for="">Requisito</label><br>
        <input type="text" name="requisito"
            value="<?php if(!empty($curso->requisito)): ?> <?php echo e($curso->requisito); ?> <?php elseif(!empty(old('requisito'))): ?><?php echo e(old('requisito')); ?><?php else: ?><?php echo e(''); ?><?php endif; ?>">
        <br><br>
        <label for="">Carga horária</label><br>
        <input type="text" name="carga_horario"
          value=" <?php if(!empty($curso->carga_horario)): ?><?php echo e($curso->carga_horario); ?><?php elseif(!empty(old('carga_horario'))): ?><?php echo e(old('carga_horario')); ?><?php else: ?><?php echo e(''); ?><?php endif; ?>"><br><br>
        <label for="">Valor</label><br>
        <input type="text" name="valor"
            value="<?php if(!empty($curso->valor)): ?><?php echo e($curso->valor); ?><?php elseif(!empty(old('valor'))): ?> <?php echo e(old('valor')); ?> <?php else: ?><?php echo e(''); ?><?php endif; ?>"><br><br>
        <button type="submit">Salvar</button><br>
        <a href="<?php echo e(route('curso.index')); ?>">Voltar</a>
    </form>
</body>
</html>

<?php /**PATH C:\laragon\www\pweb2_laravel_2023_2-main\resources\views/curso/form.blade.php ENDPATH**/ ?>