@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading ">
                  <div class="row">
                    <div class="col-md-8">
                        {{$search}} Doctors
                    </div>
                    <div class="col-md-4">
                        <form action="{{route('home.search')}}" method="get" id="typedoc">
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
                    @if (session('status'))
                        <div class="alert alert-success col-md-12">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class=" col-md-12">

                       <ul class="list-group">
                         @foreach ($doctors as $doctor)
                            <li class="list-group-item list-colors">
                              <div class="row">
                              <div class=" col-md-12">
                               <h2>{{$doctor->name}}</h2>
                               <h6>Age: {{$doctor->age}}</h6>
                               <h6>Doctor Type: {{$doctor->type}}</h6>
                             </div>
                             <div class=" col-md-12">
                              <a href="/home/doc/{{$doctor->id}}"> <button type="button" class="btn btn-primary pull-right ">Appointment</button></a>
                            </div>
                          </div>
                            </li>

                         @endforeach
                      </ul>


                    </div>
                    <div class="col-md-4 text-center col-md-offset-4">
                      {{$doctors->links()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">

        </div>
    </div>
</div>

@endsection
