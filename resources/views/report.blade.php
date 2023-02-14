@extends('layouts.app')

@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row justify-content-center">
          <div class="col-md-12 col-xl-10">
            <div class="card shadow-0 border rounded-3">
                <div class="card-header">Report Penjualan</div>
                <div class="card-body">
                    @if($transactions)
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Transaction</th>
                                <th>User</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Item</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->document_code }} - {{ $transaction->document_number }}</td>
                                    <td>{{ $transaction->username }}</td>
                                    <td>{{ $transaction->total }}</td>
                                    <td>{{ $transaction->date }}</td>
                                    <td>
                                        @foreach($transaction->details as $details)
                                            <p>{{ $details->product_name }} X {{ $details->qty }}</p>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else 
                        <span>Tidak ada data penjualan</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection