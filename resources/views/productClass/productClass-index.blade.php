@extends('layouts.master')
@section('title', 'Product Class')
@section('content')
<div class="container">
    <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="card card-dark">
                <div class="card-header">
                    <div class="card-title">List Produk Class</div>
                    <div class="card-tools">
                        <button id="addProductClass" type="button" class="btn btn-success" data-toggle="modal" data-target="#addProductClassModal" style="float:right">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="datatable-bordered nowrap display" id="productClassTable">
                        <thead>
                            <tr>
                                <th style="text-align:center">Nama</th>
                                <th style="text-align:center">Tipe Product</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
      </div>
    </div>
</div>
@include('productClass.add-productClass')
@include('productClass.edit-productClass')
@endsection
@push('custom-js')
@include('productClass.productClass-js')
@endpush