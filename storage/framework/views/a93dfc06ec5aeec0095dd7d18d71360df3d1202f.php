
<?php $__env->startSection('content'); ?>



    <h1>Création d'un nouvel événement </h1>
    <form action="<?php echo e(url('/deconnexion')); ?>" method="Get">
        <?php echo e(csrf_field()); ?>

        <button class="btn btn-dark" style="float: right" type="submit"> Déconnection</button>
    </form>
    <form action="<?php echo e(url('/deconnexion')); ?>" method="Get">
        <?php echo e(csrf_field()); ?>

        <button class="btn btn-dark" style="float:right;margin-right:20px;" type="submit"> Retour</button>
    </form>
    <form action="<?php echo e(route('CreerEventPart')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <label class="label">Titre</label><br>
        <input class="input" size="43" type="text" name="titreEvent"><br>
        <label class="label">Nom de la personne qui reçoit le cadeau</label><br>
        <input class="input" size="43" type="text" name="nom_recepteur"><br>
        <input class="input" type="hidden" name="idUserG" value=<?php echo e($idUserG); ?>>
        <label class="label">Date de l'événement:</label><br>
        <input class="input" type="date" name="dateofEvent"> <br>
        
        <h3>Liste des cadeaux</h3>
        <?php $__currentLoopData = $gifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-group">
                <div style="border:2px solid #000000;width:400px;margin:4px;">
                    <img src="<?php echo e($gift->PhotoURL); ?>"
                        style="width:50px;height:50px;border:2px solid #a0a0a0;margin:4px;" />
                    <input class="custom-control-input" type='radio' name="gift" value='<?php echo e($gift->ID); ?>'>
                    <label class="custom-control-label" for="gift"> <?php echo e($gift->Title); ?> , Le prix est <?php echo e($gift->Price); ?>


                    </label>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        <h3>Liste des participants</h3>

        <?php $__currentLoopData = $participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="form-group">
                <input class="custom-control-input" type='checkbox' name="idParticipant[]"
                    value='<?php echo e($participant->ID); ?>'>
                <label class="custom-control-label" for="idParticipant"> <?php echo e($participant->FullName); ?>

                </label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <br>
        <button class="btn btn-dark" type="submit">Créer Événement</button>
    </form>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\safyo\Desktop\Projet_PHP_Laravel\TeamGift6\resources\views/createEvent.blade.php ENDPATH**/ ?>