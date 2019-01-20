<?php $__env->startSection('content'); ?>

    <div id="wrapper">


            <div id="chatSection">

            <?php
                if(Auth::user()->image != 'null') {
                    $imageSrc = Auth::user()->image_path;
                } else {
                    $imageSrc = default_image;
                }
            ?>
            <input type="hidden" value="<?php echo e(Auth::user()->name); ?>" id="user_name">
            <input type="hidden" value="<?php echo e(Auth::user()->id); ?>" id="authId">
            <input type="hidden" value="<?php echo e($imageSrc); ?>" id="default_image">
            <input type="hidden" value="<?php echo e(url('')); ?>" id="base_url">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                  <li class="sidebar-brand">
                      <a href="<?php echo e(route('doctor')); ?>"><i class="glyphicon glyphicon-menu-left" aria-hidden="true"></i> Back</a>
                  </li>

                    <li class="sidebar-brand">
                        <a href="#">
                            Patient List To Chat
                        </a>
                    </li>


                    <user-log :users="users" v-on:getcurrentuser="getCurrentUser"></user-log>



                </ul>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="chat-info">
                                <h2><span class="label label-success">Welcome</span></h2>
                                <p><span class="label label-default">Choose one of your Patient from left sidebar to make a conversion.</span></p>
                            </div>
                            <div class="activate-chat">
                                <div class="docheader">

                                </div>
                                <div id="doccontent" class="scrollbar">
                                    <ul class="messages" v-chat-scroll>

                                      <chat-log :messages="messages"></chat-log>



                                    </ul>
                                </div>
                                <div class="docfooter">

                                  <chat-composer v-on:messagesent="addMessage" :user-id="userId"></chat-composer>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/moment.min.js')); ?>"></script>
</body>

</html>
<script>
$(function(){
    $("#wrapper").toggleClass("toggled");
    var docHeight = $(document).height();
    var contentHeight = docHeight-72;
    $("#content").css('height',''+contentHeight+'px');
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>