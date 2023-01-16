@extends('layouts.master')
@section('title', 'Master Product Variant')
@section('content')
<div class="container">
    <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="card card-dark">
                <div class="card-header">
                    <div class="card-title">List Varian Produk</div>
                    <div class="card-tools">
                        <button id="addPV" type="button" class="btn btn-success" data-toggle="modal" data-target="#addProductVariant" style="float:right">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="datatable-bordered nowrap display" id="productVariantTable">
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

@include('productVariant.add-productVariant')
@include('productVariant.edit-productVariant')
@endsection
@push('custom-js')
@include('productVariant.productVariant-js')
@endpush