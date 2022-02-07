
<?php $__env->startSection('content'); ?>

    <h1>Mes évenements reçus</h1>
    <form action="<?php echo e(url('/deconnexion')); ?>" method="Get">
        <?php echo e(csrf_field()); ?>

        <button class="btn btn-dark" style="float: right" type="submit"> Déconnection</button>
    </form>
    <form action="<?php echo e(url('/deconnexion')); ?>" method="Get">
        <?php echo e(csrf_field()); ?>

        <button class="btn btn-dark" style="float:right;margin-right:20px;"  href="<?php echo e(route('home')); ?>">Retour</button>
    </form>
    <table class="table table is-bordered">
        <thead>
            <tr>

                <th>Titre événement</th>
                <th class="text-center">Date événement</th>
                <th>Organisateur</th>
                <th class="text-center">État</th>

            </tr>
        </thead>

        <?php $__currentLoopData = $allEvent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $infoEv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php for($i = 0; $i < count($tabIdEvent); $i++): ?>
                <?php if($tabIdEvent[$i] == $infoEv->ID): ?>
                    <tr>
                        <td><?php echo e($infoEv->Title); ?></td>
                        <td class="text-center"><?php echo e($infoEv->DateOfEvent); ?></td>
                        <td><?php echo e($organisateur = app\models\UserG::find($infoEv->OrganizerID)->FullName); ?></td>
                        <td>
                            <form class="text-center" action="<?php echo e(route('detailEvenement')); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>


                                <input type="hidden" name="idUserG" value=<?php echo e($idUserG); ?>>
                                <input type="hidden" name="idEvent" value=<?php echo e($infoEv->ID); ?>>
                                <input type="hidden" name="idorganisateur" value=<?php echo e($infoEv->OrganizerID); ?>>
                                <input type="hidden" name="organisateur" value=<?php echo e($organisateur); ?>>
                                <button class="btn btn-dark type="submit" value="accepter ">Accepter</button>
                            </form><br>
                        </td>
                    </tr>
                <?php endif; ?>

            <?php endfor; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samou\Desktop\TeamGift6\resources\views/listeEventsRecus.blade.php ENDPATH**/ ?>