@extends('layouts.master')
@section('title', 'Master Product Type')
@section('content')
<div class="container">
    <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="card card-dark">
                <div class="card-header">
                    <div class="card-title">List Tipe Produk</div>
                    <div class="card-tools">
                        <button id="addPT" type="button" class="btn btn-success" data-toggle="modal" data-target="#addProductType" style="float:right">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="datatable-bordered nowrap display" id="productTypeTable">
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

@include('productType.add-productType')
@include('productType.edit-productType')
@endsection
@push('custom-js')
@include('productType.productType-js')
@endpush