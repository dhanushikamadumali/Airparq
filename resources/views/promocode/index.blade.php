@extends('layouts.main.master')

@section('content')
 <div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Promo Code</h3>
      <ul class="breadcrumbs mb-3">
        <li class="nav-home">
          <a href="#">
            <i class="icon-home"></i>
          </a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Dashboard</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
          <a href="{{asset('createpromocode')}}">
             <button
                class="btn page_btn"
                data-bs-toggle="modal"
                data-bs-target="#addRowModal"
              >
                <i class="fa fa-plus"></i>
                Add New Promo Code
              </button>
            </a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table
                id="basic-datatables"
                class="display table table-striped table-hover"
              >
                <thead>
                  <tr>
                    <th>Promo Code</th>
                    <th>Discount Amount</th>
                    <th>Discount Type</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($promocodelist as $promocode)
                  <tr>
                    <td>{{$promocode->promo_code}}</td>
                    <td>{{$promocode->discount_amount}}</td>
                    <td>{{$promocode->discount_type}}</td>
                    <td></td>
                    <td>
                        <a href="{{ route('editpromocode',Crypt::encryptString($promocode->id))}}">
                             <i class="fa fa-edit editbtn"></i>
                        </a>
                        <button class="btn p-0 delete" onclick="promocodedelete('{{Crypt::encryptString($promocode->id)}}')">
                        <i class="fa fa-times deletebtn"></i>
                        </button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

