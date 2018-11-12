@extends('layouts.app')

@section('title', '| Home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">CRM</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        You are logged in!
                    @else
                        You are NOT Logged in...
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
