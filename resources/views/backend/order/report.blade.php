@extends('backend.master')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">All Order List</h3>
    </div>
    
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ url('admin/accounts-reports') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="from">From Date</label>
                    <input type="date" name="from" id="from" class="form-control" value="{{ request('from') }}">
                </div>
                <div class="col-md-4">
                    <label for="to">To Date</label>
                    <input type="date" name="to" id="to" class="form-control" value="{{ request('to') }}">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ url('admin/accounts-reports') }}" class="btn btn-secondary ml-2">Reset</a>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>{{$totalOrder}}</h3>
    
                    <p>Total Orders</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="{{url('admin/all-orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>BDT {{$totalSell}}</h3>
    
                    <p>Total Sell</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="{{url('admin/all-orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                  <div class="inner">
                    <h3>BDT {{$totalCharge}}</h3>
    
                    <p>Total Delivery Charge</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="{{url('admin/all-orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>BDT {{$profitAmount}}</h3>
    
                    <p>Total Delivery Charge</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="{{url('admin/all-orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Sl</th>
          <th>Invoice Number</th>
          <th>Product</th>
          <th>Customer Info</th>
          <th>Courier Name</th>
          <th>Current Status</th>
          <th>Status</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($orders as $order)
        <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$order->invoiceId}}</td>
          <td>
              @foreach ( $order->orderDetails as $details)
                <img src="{{asset('backend/images/product/'.$details->product->image)}}" height="100" width="100">
                {{$details->qty}} X {{$details->product->name}} <br><br>
              @endforeach
          </td>
          <td>
              Name:  {{$order->c_name}}<br>
              Phone: {{$order->c_phone}} <br>
              Address: {{$order->address}} <br>
              Price: {{$order->price}} <br>
          </td>
          <td>{{$order->courier_name}}</td>
          <td>
            <span class="badge badge-success">{{ucfirst($order->status)}}</span>
          </td>
          <td>
              <a href="{{url('/admin/order/status/'.$order->id.'/cancelled')}}" class="btn btn-danger">Cancel</a>
              <a href="{{url('/admin/order/status/'.$order->id.'/confirmed')}}" class="btn btn-success">Confirm</a>
              <a href="{{url('/admin/order/status/'.$order->id.'/delivered')}}" class="btn btn-info">Delivered</a>
          </td>
      </tr>
        @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection

@push('js')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endpush