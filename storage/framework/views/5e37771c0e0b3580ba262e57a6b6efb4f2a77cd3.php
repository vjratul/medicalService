<?php $__env->startSection('content'); ?>
<div class="container ">
  <a href="<?php echo e(url()->previous()); ?>"><i class="glyphicon glyphicon-menu-left" aria-hidden="true"></i> Back</a>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading ">

                    <div class="col-md-12">
                      <?php if(session('status')): ?>
                          <div class="alert alert-success">
                              <?php echo e(session('status')); ?>

                          </div>
                      <?php endif; ?>
                        Doctor Reservation
                    </div>


              </div>

                <div class="panel-body">


                    <div class=" col-md-12">

                       <ul class="list-group">

                            <li class="list-group-item list-colors">

                               <h2><?php echo e($doc->name); ?></h2>
                               <h6>Age: <?php echo e($doc->age); ?></h6>
                               <h6>Doctor Type: <?php echo e($doc->type); ?></h6>

                               <h6>Appointment Time:<?php echo e($start); ?>

                                 <?php if($start==''): ?>
                                  <?php echo e($toempty); ?>

                                 <?php else: ?>
                                 <?php echo e($to); ?>

                                 <?php endif; ?>
                                <?php echo e($time); ?></h6>



                             </div>


                            </li>


                      </ul>
                      <form  method="POST" action="<?php echo e(route('doctor_reservation')); ?>" class="disabled">
                          <?php echo e(csrf_field()); ?>

                       <input type="hidden" name="doctor_id" value="<?php echo e($doc->id); ?>">
                      <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                        <label for="name" class="col-md-12 control-label ">Disease Descripton</label>
                          <div class="col-md-12">
                              <textarea  rows="10" type="text"
                              <?php if($time=="No Available Times"): ?>
                               disabled
                               <?php else: ?>
                                 id="t"
                                <?php endif; ?>
                               placeholder="Enter your Disease Description"class="form-control" name="description" value="<?php echo e(old('description')); ?>" required autofocus></textarea>

                              <?php if($errors->has('description')): ?>
                                  <span class="help-block">
                                      <strong><?php echo e($errors->first('description')); ?></strong>
                                  </span>
                              <?php endif; ?>
                          </div>
                        </div>
                        <input type="hidden" name="timeslots_id" value="<?php if($doctimeslot): ?>
                          <?php echo e($doctimeslot->id); ?>

                           <?php else: ?>
                              1
                            <?php endif; ?>">
                        <input type="hidden" name="booking_status_id" value="1">
                        <input type="hidden" name="start_time" value="<?php echo e($start); ?>">
                        <input type="hidden" name="end_time" value="<?php echo e($time); ?>">
                        <div class="form-group">
                          <div class="col-md-12  control-label1">
                          <button type="button"
                          <?php if($time=="No Available Times"): ?>
                           disabled
                           <?php else: ?>
                             id="t"
                            <?php endif; ?>
                             class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                            Payment
                          </button>
                        </div>
                        </div>


                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Doctor Charge: <?php if($doctimeslot): ?>
                                  <?php echo e($doctimeslot->payment); ?> Tk
                                   <?php else: ?>
                                      No Payment info
                                    <?php endif; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="form-group<?php echo e($errors->has('payment') ? ' has-error' : ''); ?> modal-pay">
                                    <div class="col-md-12 ">
                                        <input id="name"  type="text" placeholder="Enter 1000 for 1000 tk"class="form-control" name="payment" value="<?php echo e(old('payment')); ?>" required autofocus>

                                        <?php if($errors->has('payment') ): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('payment')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Confirm Appointment</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>



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