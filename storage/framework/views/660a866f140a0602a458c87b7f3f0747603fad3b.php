
<?php $__env->startSection('content'); ?>

    <h1>Mes Événements organisés</h1>
    <form action="<?php echo e(url('/deconnexion')); ?>" method="Get">
        <?php echo e(csrf_field()); ?>

        <button class="btn btn-dark" style="float: right" type="submit"> Déconnection</button>
    </form>
    <form action="<?php echo e(url('/deconnexion')); ?>" method="Get">
        <?php echo e(csrf_field()); ?>

        <button class="btn btn-dark" style="float:right;margin-right:20px;" type="submit"> Retour</button>
    </form>
    <table class="table table is-bordered">
        <thead>
            <tr>

                <th>Titre événement</th>
                <th class="text-center">Date événement</th>
                <th class="text-center">Cadeau</th>
                <th class="text-center">Prix</th>
                <th class="text-center">Photo cadeau</th>


            </tr>
        </thead>


        <?php $__currentLoopData = $mesevenementsorganises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($event->Title); ?></td>
                <td class="text-center"><?php echo e($event->DateOfEvent); ?></td>
                <td class="text-center"><?php echo e($gift = App\models\Gift::find($event->GiftID)->Title); ?></td>
                <td class="text-center"><?php echo e($giftprice = App\models\Gift::find($event->GiftID)->Price); ?></td>
                <td class="text-center"><img src=<?php echo e($giftimage = App\models\Gift::find($event->GiftID)->PhotoURL); ?>

                        style="width:50px;height:50px;border:2px solid #a0a0a0;margin:4px;" /></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samou\Desktop\TeamGift6\resources\views/listeMesevenementorganise.blade.php ENDPATH**/ ?>