@extends('layouts.master')
@section('title', 'Master Product Diameter')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-dark">
                <div class="card-header">
                    <div class="card-title">List OEE Defect</div>
                    <div class="card-tools">
                        <button id="addPV" type="button" class="btn btn-success" data-toggle="modal" data-target="#addOeeDefect" style="float:right">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="datatable-bordered nowrap display" id="oeeDefectTable">
                        <thead>
                            <tr>
                                <th style="text-align:center">Nama</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('oeeDefect.add-oeeDefect')
@include('oeeDefect.edit-oeeDefect')
@endsection
@push('custom-js')
@include('oeeDefect.oeeDefect-js')
@endpush