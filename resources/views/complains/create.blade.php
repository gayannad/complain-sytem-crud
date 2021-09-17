@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    New Complain
                    <a href="{{route('complains.index')}}" target="_self">
                        <button type="button" class="btn btn-primary  float-right "><i class="fa fa-list"> Complain
                                List</i>
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('complains.store')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label  class="col-md-4 col-form-label">Customer Name</label>
                        <div class="col-md-8">
                            <input id="customer_name" type="text"
                                   class="form-control @error('customer_name') is-invalid @enderror" name="customer_name"
                                   value="{{ old('customer_name') }}">

                            @error('customer_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label  class="col-md-4 col-form-label">Customer Age</label>
                        <div class="col-md-8">
                            <input id="customer_age" type="number"
                                   class="form-control @error('customer_age') is-invalid @enderror" name="customer_age"
                                   value="{{ old('customer_age') }}">

                            @error('customer_age')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label  class="col-md-4 col-form-label">Customer Address</label>
                        <div class="col-md-8">
                            <textarea name="customer_address" id="customer_address" cols="30" rows="4"
                                      class="form-control @error('customer_address') is-invalid @enderror">
                                {{ old('customer_address') }}
                            </textarea>

                            @error('customer_address')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label  class="col-md-4 col-form-label">Problem Description</label>
                        <div class="col-md-8">
                            <textarea name="problem_description" id="problem_description" cols="30" rows="4"
                                      class="form-control @error('problem_description') is-invalid @enderror">
                                {{ old('problem_description') }}
                            </textarea>

                            @error('problem_description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label  class="col-md-4 col-form-label">Date</label>
                        <div class="col-md-8">
                            <input id="date" type="date"
                                   class="form-control @error('date') is-invalid @enderror" name="date"
                                   value="{{ old('date') }}">

                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label  class="col-md-4 col-form-label">Problem Status</label>
                        <div class="col-md-8 row">
                            <div class="col-md-4">
                                <input type="radio" name="status" value="0" checked> Pending
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="status" value="1"> Resolved
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-8 offset-4">
                            <button type="submit" class="btn btn-success ">Save Complain</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
