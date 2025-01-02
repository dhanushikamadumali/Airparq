@extends('layouts.main.master')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Add Promo Code</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="separator">
                        <i class="icon-arrow-left"></i>
                    </li>
                    <li class="nav-item">
                         <a href="{{ URL::previous() }}">Back</a>
                    </li>
                </ul>
            </div>
    <form action="{{route('storepromocode')}}" method="POST" >
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-12">
                            <div class="form-group">
                            <label>Promo Code</label>
                            <input
                                type="text"
                                class="form-control"
                                id="promo_code"
                                name="promo_code"
                            />
                            @error('promo_code')
                            <div style="color:red" >{{$message}}</div>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                            <label>Discount Amount</label>
                            <input
                                type="number"
                                class="form-control"
                                id="discount_amount"
                                name="discount_amount"
                            />
                            @error('discount_amount')
                            <div style="color:red">{{$message}}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                            <labele>Discount Type</label>
                            <select
                            class="form-select form-control"
                            id="discount_type"
                            name="discount_type"
                            >
                            <option value="defult_value">Discount</option>
                            <option value="percent">Percent</option>
                            </select>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-action">
                    <button class="btn btn page_btn" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>
    </div>
@endsection

