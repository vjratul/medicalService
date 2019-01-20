@extends('layouts.app2')

@section('content')

    <div id="wrapper">


            <div id="chatSection">

            <?php
                if(Auth::user()->image != 'null') {
                    $imageSrc = Auth::user()->image_path;
                } else {
                    $imageSrc = default_image;
                }
            ?>
            <input type="hidden" value="{{ Auth::user()->name }}" id="user_name">
            <input type="hidden" value="{{ Auth::user()->id }}" id="authId">
            <input type="hidden" value="{{ $imageSrc }}" id="default_image">
            <input type="hidden" value="{{ url('') }}" id="base_url">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                  <li class="sidebar-brand">
                      <a href="{{ route('doctor') }}"><i class="glyphicon glyphicon-menu-left" aria-hidden="true"></i> Back</a>
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
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
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
@endsection
