@extends('layouts.master')
@section('title', 'Master Panjang Produk')
@section('content')
<div class="container">
    <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="card card-maroon">
                <div class="card-header">
                    <div class="card-title">List Panjang Produk</div>
                    <div class="card-tools">
                        <button id="addPT" type="button" class="btn btn-success" data-toggle="modal" data-target="#addProductType" style="float:right">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="datatable-bordered nowrap display" id="productLengthTable">
                        <thead>
                            <tr>
                                <th style="text-align:center">Panjang</th>
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

@include('productLength.add-productLength')
@include('productLength.edit-productLength')
@endsection
@push('custom-js')
@include('productLength.productLength-js')
@endpush