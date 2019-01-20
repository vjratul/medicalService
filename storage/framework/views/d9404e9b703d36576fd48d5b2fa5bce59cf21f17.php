<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        
        <div class="col-md-8">
            <div class="panel panel-default">

                <div class="panel-heading">
                  Patient List
                </div>

            <div class="panel-body">
                <div class=" col-md-12">

                   <ul class="list-group">
                    <?php $__currentLoopData = $patient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patients): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item list-colors">
                          <div class="row">
                          <div class=" col-md-12">
                           <h2>Patient Details</h2>
                           <h6>Name:<?php echo e($patients->name); ?> </h6>
                           <h6>Email:<?php echo e($patients->email); ?> </h6>
                           <h6>Appoinment time :<?php echo e(\Carbon\Carbon::parse($patients->start_time)->toDayDateTimeString()); ?>  to <?php echo e(\Carbon\Carbon::parse($patients->end_time)->toDayDateTimeString()); ?></h6>
                         </div>
                         <div class=" col-md-12">
                          <a href="#"> <button type="button" class="btn btn-primary pull-right ">Start Consultancy</button></a>
                        </div>
                      </div>
                        </li>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </ul>


                </div>
                <div class='col-md-12 text-center'>
                    <?php echo e($patient->links()); ?>

                </div>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-default">

              <div class="panel-heading text-center">
                Add Your Available Times and Your payment rates per client.
              </div>
              <div class="panel-body">
                  <?php if(session('status')): ?>
                      <div class="alert alert-success">
                          <?php echo e(session('status')); ?>

                      </div>
                  <?php endif; ?>


              </div>

              <div class="panel-body">
                <form class="form-horizontal" method="POST" action="<?php echo e(route('doctor.time')); ?>">
                    <?php echo e(csrf_field()); ?>


                    <div class="form-group<?php echo e($errors->has('start_time') ? ' has-error' : ''); ?>">
                        <label for="name" class="col-md-5 control-label">Start Time</label>

                        <div class='col-md-6'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker'>
                                    <input type='text' class="form-control"  name="start_time"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="form-group<?php echo e($errors->has('end_time') ? ' has-error' : ''); ?>">
                        <label for="name" class="col-md-5 control-label">End Time</label>

                        <div class='col-md-6'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control"  name="end_time"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group<?php echo e($errors->has('duration') ? ' has-error' : ''); ?>">
                        <label for="name" class="col-md-5 control-label">Duration</label>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input id="name" type="text" class="form-control" name="duration" placeholder="Enter 20 for 20 min" value="<?php echo e(old('regid')); ?>" required autofocus>

                        <?php if($errors->has('regid')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('duration')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                  </div>
                    </div>
                    <div class="form-group<?php echo e($errors->has('payment') ? ' has-error' : ''); ?>">
                        <label for="name" class="col-md-5 control-label">Payment</label>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input id="name" type="text" class="form-control" name="payment" placeholder="Enter 500 for 500 tk" value="<?php echo e(old('regid')); ?>" required autofocus>


                        <?php if($errors->has('regid')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('payment')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                  </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3 text-center">
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                      </div>
                    </div>
                </form>

              </div>

          </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>