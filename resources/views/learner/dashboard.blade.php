@extends('layouts.admin')

@section('title', 'LEMS | Learner Dashboard')

@section('content')
<div class="row g-2 mt-1">
    <div class="col-md-12">
        <div class="card text-center text-success shadow-sm">
            <div class="card-body">
                <i class="bi bi-mortarboard-fill display-6 mb-2"></i>
                <h5 class="card-title">Welcome Learner!</h5>
                <p class="lead">You're logged in as a learner. Your tools and modules appear here.</p>
            </div>
        </div>
    </div>
</div>
@endsection
