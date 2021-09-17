@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message  }}</p>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message  }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Complain List
                    <a href="{{route('complains.create')}}" target="_self">
                        <button type="button" class="btn btn-primary  float-right "><i class="fa fa-plus">New
                                Complain</i>
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <table class="table table-bordered table-responsive-lg">
                        <tr class="text-center font-weight-bolder">
                            <th>#ID</th>
                            <th>Customer Name</th>
                            <th>Date</th>
                            <th>Problem Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($complains as $complain)
                            <tr class="text-center">
                                <td>{{$complain->id}}</td>
                                <td>{{$complain->customer_name}}</td>
                                <td>{{$complain->date}}</td>
                                <td>
                                    @if($complain->status == \App\Models\Complain::STATUS_PENDING)
                                        <span class="badge badge-warning">Pending</span>
                                    @else
                                        <span class="badge badge-success">Resolved</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('complains.edit',$complain->id)}}"
                                       class="btn btn-success btn-sm"
                                       title="Edit"><i class="fa fa-edit"></i> Edit</a>
                                </td>
                                <td class="text-center">
                                    <form action="{{route('complains.destroy',$complain->id)}}"
                                          method="POST">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger js-tooltip btn-sm"
                                                title="Delete"><em class="fa fa-trash"
                                                                   onclick="return confirm('Are you sure?')">
                                                Delete</em>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            {{$complains->links()}}
        </div>
    </div>
@endsection
