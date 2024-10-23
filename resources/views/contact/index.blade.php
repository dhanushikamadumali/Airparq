@extends('layouts.main.master')
@section('content')
 <div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Contact</h3>
        <ul class="breadcrumbs mb-3">
            <li class="separator">
                <i class="icon-arrow-left"></i>
            </li>
            <li class="nav-item">
                 <a href="{{ URL::previous() }}">Back</a>
            </li>
        </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table
                id="basic-datatables"
                class="display table table-striped table-hover"
              >
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Comment</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($contactlists as $contactlist)
                  <tr>
                    <td>{{$contactlist->name}}</td>
                    <td>{{$contactlist->email}}</td>
                    <td>{{$contactlist->comment}}</td>
                    <td>
                        <button class="btn p-0 delete" onclick="contactdelete('{{Crypt::encryptString($contactlist->id)}}')">
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

