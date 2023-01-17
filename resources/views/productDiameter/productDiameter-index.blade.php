@extends('layouts.master')
@section('title', 'Master Product Diameter')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-dark">
                <div class="card-header">
                    <div class="card-title">List Diameter Produk</div>
                    <div class="card-tools">
                        <button id="addPV" type="button" class="btn btn-success" data-toggle="modal" data-target="#addProductDiameter" style="float:right">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="datatable-bordered nowrap display" id="productDiameterTable">
                        <thead>
                            <tr>
                                <th style="text-align:center">Ukuran</th>
                                <th style="text-align:center">Satuan</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('productDiameter.add-productDiameter')
@include('productDiameter.edit-productDiameter')
@endsection
@push('custom-js')
@include('productDiameter.productDiameter-js')
@endpush