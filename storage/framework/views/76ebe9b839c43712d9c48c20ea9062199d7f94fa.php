<?php $__env->startSection('content'); ?>
<div class="container ">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading ">
                  <div class="row">
                    <div class="col-md-8">
                        <?php echo e($search); ?> Doctors
                    </div>
                    <div class="col-md-4">
                        <form action="<?php echo e(route('home.search')); ?>" method="get" id="typedoc">
                        <select class="form-control pull-right" name="type"  onchange="myfunc()">
                          <option value="">Select Doctors type</option>
                          <option value="All">All Doctors</option>
                          <option value="Medical">Medical</option>
                          <option value="Dental">Dental</option>
                        </select>

                      </form>
                    </div>
                </div>
              </div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success col-md-12">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>


                    <div class=" col-md-12">

                       <ul class="list-group">
                         <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item list-colors">
                              <div class="row">
                              <div class=" col-md-12">
                               <h2><?php echo e($doctor->name); ?></h2>
                               <h6>Age: <?php echo e($doctor->age); ?></h6>
                               <h6>Doctor Type: <?php echo e($doctor->type); ?></h6>
                             </div>
                             <div class=" col-md-12">
                              <a href="/home/doc/<?php echo e($doctor->id); ?>"> <button type="button" class="btn btn-primary pull-right ">Appointment</button></a>
                            </div>
                          </div>
                            </li>

                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>


                    </div>
                    <div class="col-md-4 text-center col-md-offset-4">
                      <?php echo e($doctors->links()); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>