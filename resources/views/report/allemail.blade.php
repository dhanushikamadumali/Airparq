@extends('layouts.main.master')
@section('content')
 <div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Sign-up Emails</h3>
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
           <div class="card-header">
        <div class="row g-3">
             <a href="{{asset('admin/allemailpdf')}}">
                <button class="btn page_btn" >
                        PDF
                </button>
            </a>
        </div>
        </div>

          <div class="card-body">
            <div class="table-responsive">
              <table
                id="basic-datatables"
                class="display table table-striped table-hover"
              >
                <thead>
                  <tr>
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($emaillists as $emaillist)
                  <tr>

                    <td>{{$emaillist->email}}</td>

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

