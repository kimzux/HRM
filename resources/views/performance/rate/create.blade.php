@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="message"></div>
    <div class="header">
      <div class="container-fluid">
            <div class="header-body ml-1">
              <div class="row align-items-end">
                   <div class="col">
                      <h1 class="header-title">
                Rate Goals Average Performance
                       </h1>
                    </div>
                </div> 
            </div> 
        </div>
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid mt-4">
        <div class="row m-b-10">
           
            <div class="col-12">

          
            </div>
          
        </div>
        <div class="row mt-4">
            <div class="col-8">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0"> Overall Ratings Goals
                        </h4>
                    </div>
                   
                    <div class="card-body">
                        @if(is_null($rate))
                       <p>You need to rate your performance concern that Goals</p>
                        @elseif($rate<=1)
                       <p>{{ $rate}} Your performance is poor you need to improve</p>
                       @elseif($rate<=2)
                       <p>{{ $rate}} Your performance is Fair you need to improve</p>
                       @elseif($rate<=3)
                       <p>{{ $rate}} Your performance is Satisfactory </p>
                       @elseif($rate<=4)
                       <p>{{ $rate}} Your performance is Good </p>
                       @elseif($rate<=5)
                       <p>{{ $rate}} Your performance is Excellent </p>


                       @endif
                    </div>
                </div>
            </div>
        </div>
       
    

  
      
       
        @endsection