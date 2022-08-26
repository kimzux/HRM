@extends('layouts.app')

@section('content')
<div class="row m-b-10"> 
                    <div class="col-12 text-right">
                    <button type="button" class="btn btn-info"><i class="fe fe-print"></i><a href="{{route('download.payslip', $payslip->id)}}" class="text-white"><i class="" aria-hidden="true"></i>download Payslip</a></button>
                       <!-- <button type="button" class="btn btn-primary"><i class="fe fe-printer"></i><a href="{{route('payrol.create')}}" class="text-white"><i class="" aria-hidden="true"></i>  Generate Payroll</a></button>-->
                       <!-- <button type="button" class="btn btn-info"><i class="fe fe-printer"></i><a href="{{route('payrol.create')}}" class="text-white"><i class="" aria-hidden="true"></i>  Generate Payslip</a></button> 
                   -->
                    </div>
                </div> 
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center lh-1 mb-2">
                <h6 class="fw-bold">Payslip</h6> <span class="fw-normal">Payment slip for the month of {{$payslip->payroll->month}}</span>
            </div>
            <div class="d-flex justify-content-end"> <span>Company Name:Ark</span> </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">EMP Code</span> <small class="ms-3">{{$payslip->employee->em_code}}</small> </div>
                        </div>
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">EMP Name</span> <small class="ms-3">{{$payslip->employee->first_name}}</small> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">PS No.</span> <small class="ms-3">{{$payslip->id}}</small> </div>
                        </div>
                       
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">Designation</span> <small class="ms-3">{{$payslip->employee->designation->des_name}}</small> </div>
                        </div>
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">Ac No.</span> <small class="ms-3">{{$payslip->employee->bank_info->account_number}}</small> </div>
                        </div>
                    </div>
                </div>
                <table class="mt-4 table table-bordered">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Earnings</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Deductions</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Basic Salary</th>
                            <td>{{$payslip->employee->salary->basic_salary}}</td>
                            @foreach ($payslip->deductions as $deduction)
                            <th scope="row">{{$deduction->deduction_name}}</th>
                            <td>{{$deduction->amount}}</td>
                            @endforeach
                        </tr>
                        
                        <tr>
                            @foreach ($payslip->benefits as $benefit)
                            <th scope="row">{{$benefit->benefit_name}}</th>
                            <td>{{$benefit->amount}}</td><br>
                          
                            @endforeach
                            
                        </tr>
                        <!-- <tr>
                            <th scope="row">Leave Encashment</th>
                            <td>0.00</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th scope="row">Holiday Wages</th>
                            <td>500.00</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th scope="row">Special Allowance</th>
                            <td>100.00</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th scope="row">Bonus</th>
                            <td>1400.00</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th scope="row">Individual Incentive</th>
                            <td>2400.00</td>
                            <td colspan="2"></td>
                        </tr> -->
                        <tr class="border-top">
                            <th scope="row">Total Earning</th>
                            <td>25970.00</td>
                            <td>Total Deductions</td>
                            <td>2442.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-4"> <br> <span class="fw-bold">Net Pay : {{$payslip->net_pay}}</span> </div>
                <!-- <div class="border col-md-8">
                    <div class="d-flex flex-column"> <span>In Words</span> <span>Twenty Five thousand nine hundred seventy only</span> </div>
                </div> -->
            </div>
            <div class="d-flex justify-content-end">
                <div class="d-flex flex-column mt-2"> <span class="fw-bolder">For {{$payslip->employee->first_name}}</span> <span class="mt-4">Authorised Signatory</span> </div>
            </div>
        </div>
    </div>
</div>
@endsection
