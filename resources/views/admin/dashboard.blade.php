@extends('layouts.admin')

@section('title', 'LEMS | Dashboard')

@section('content')
<div class="row g-2 mt-1">
    <!-- Total Users -->
    <div class="col-md-4">
        <div class="card text-center text-primary shadow-sm">
            <div class="card-body">
                <i class="bi bi-people-fill display-6 mb-2"></i>
                <h5 class="card-title">Total Users</h5>
                <p class="display-4 mb-0">{{ $userCount }}</p>
            </div>
        </div> 
    </div>

    <!-- Total Mail Logs -->
    <div class="col-md-4">
        <div class="card text-center text-primary shadow-sm">
            <div class="card-body">
                <i class="bi bi-envelope-paper-fill display-6 mb-2"></i> 
                <h5 class="card-title">Total Mail Logs</h5>
                <p class="display-4 mb-0">{{ $mailLogCount }}</p>
            </div>
        </div>
    </div>

    <!-- Add more summary cards below -->
</div>
@endsection

@push('scripts')
    @if(session('emailSuccess'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Email Sender',
                text: '{{ session('emailSuccess') }}',
                confirmButtonColor: '#3085d6',
                timer: 4000,
                showConfirmButton: false
            });
        </script>
    @endif
@endpush