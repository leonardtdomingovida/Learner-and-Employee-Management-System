@extends('layouts.admin')

@section('title', 'LEMS | Employee Dashboard')

@section('content')
<div class="row g-2 mt-1">
    <div class="col-md-12">
        <div class="card text-center text-info shadow-sm">
            <div class="card-body">
                <i class="bi bi-person-workspace display-6 mb-2"></i>
                <h5 class="card-title">Welcome Employee!</h5>
                <p class="lead">You're logged in as an employee. Explore your dashboard tools here.</p>
            </div>
        </div>
    </div>
</div>
@endsection
