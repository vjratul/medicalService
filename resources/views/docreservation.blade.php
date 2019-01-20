@extends('layouts.app')

@section('content')
<div class="container ">
  <a href="{{ url()->previous() }}"><i class="glyphicon glyphicon-menu-left" aria-hidden="true"></i> Back</a>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading ">

                    <div class="col-md-12">
                      @if (session('status'))
                          <div class="alert alert-success">
                              {{ session('status') }}
                          </div>
                      @endif
                        Doctor Reservation
                    </div>


              </div>

                <div class="panel-body">


                    <div class=" col-md-12">

                       <ul class="list-group">

                            <li class="list-group-item list-colors">

                               <h2>{{$doc->name}}</h2>
                               <h6>Age: {{$doc->age}}</h6>
                               <h6>Doctor Type: {{$doc->type}}</h6>

                               <h6>Appointment Time:{{$start}}
                                 @if($start=='')
                                  {{$toempty}}
                                 @else
                                 {{$to}}
                                 @endif
                                {{$time}}</h6>



                             </div>


                            </li>


                      </ul>
                      <form  method="POST" action="{{ route('doctor_reservation') }}" class="disabled">
                          {{ csrf_field() }}
                       <input type="hidden" name="doctor_id" value="{{$doc->id}}">
                      <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-12 control-label ">Disease Descripton</label>
                          <div class="col-md-12">
                              <textarea  rows="10" type="text"
                              @if($time=="No Available Times")
                               disabled
                               @else
                                 id="t"
                                @endif
                               placeholder="Enter your Disease Description"class="form-control" name="description" value="{{ old('description') }}" required autofocus></textarea>

                              @if ($errors->has('description'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('description') }}</strong>
                                  </span>
                              @endif
                          </div>
                        </div>
                        <input type="hidden" name="timeslots_id" value="@if($doctimeslot)
                          {{$doctimeslot->id}}
                           @else
                              1
                            @endif">
                        <input type="hidden" name="booking_status_id" value="1">
                        <input type="hidden" name="start_time" value="{{$start}}">
                        <input type="hidden" name="end_time" value="{{$time}}">
                        <div class="form-group">
                          <div class="col-md-12  control-label1">
                          <button type="button"
                          @if($time=="No Available Times")
                           disabled
                           @else
                             id="t"
                            @endif
                             class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                            Payment
                          </button>
                        </div>
                        </div>


                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Doctor Charge: @if($doctimeslot)
                                  {{$doctimeslot->payment}} Tk
                                   @else
                                      No Payment info
                                    @endif</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="form-group{{ $errors->has('payment') ? ' has-error' : '' }} modal-pay">
                                    <div class="col-md-12 ">
                                        <input id="name"  type="text" placeholder="Enter 1000 for 1000 tk"class="form-control" name="payment" value="{{ old('payment') }}" required autofocus>

                                        @if ($errors->has('payment') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('payment') }}</strong>
                                            </span>
                                        @endif
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

@endsection
