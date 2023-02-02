@extends('layouts.master')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-maroon">
                <div class="card-header">
                    <div class="card-title">Filter</div>
                    <div class="card-tools">
                        <button type="button" class="btn" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                   
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">OEE</div>
                    <div class="card-tools">
                        <button type="button" class="btn" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container" id="gaugNpat-value_container">
                        <p id="label_gaugNpat"><output  id="gaugNpat-value" ></output></p>                                             
                    </div>
                </div>
            </div>
          
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Performance</div>
                    <div class="card-tools">
                        <button type="button" class="btn" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container" id="gaugNpat-value_container">
                        <p id="label_gaugNpat"><output  id="gaugNpat-value" ></output></p>                                             
                    </div>
                </div>
            </div>
          
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Quality</div>
                    <div class="card-tools">
                        <button type="button" class="btn" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container" id="gaugNpat-value_container">
                        <p id="label_gaugNpat"><output  id="gaugNpat-value" ></output></p>                                             
                    </div>
                </div>
            </div>
          
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Availability</div>
                    <div class="card-tools">
                        <button type="button" class="btn" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container" id="gaugNpat-value_container">
                        <p id="label_gaugNpat"><output  id="gaugNpat-value" ></output></p>                                             
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</div>


@endsection
@push('custom-js')
@include('home.home-js')
@endpush