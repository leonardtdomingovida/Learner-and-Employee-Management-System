@extends('layouts.admin')

@section('title', 'LEMS | Registered Users')

@section('content')
<div class="container">
    <!-- Loader Overlay -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status" style="width: 4rem; height: 4rem;">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="mt-3 text-primary" id="loaderMessage">
            Loading records...
        </div>
    </div>


    <!-- Sticky header -->
    <div class="sticky-top bg-white shadow-sm py-2 mb-0">
        <div class="d-flex flex-column flex-md-row flex-wrap justify-content-between align-items-start align-items-md-center">
            <h5 class="mb-2 mb-md-0">Registered Users</h5>
            <div class="d-flex flex-wrap gap-2">
                <!-- <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-house-door-fill"></i>
                </a> -->
                <a href="{{ route('register.form') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-person-plus-fill"></i> Register
                </a>
            </div>
        </div>
    </div>

    <!-- Mail Form and Table -->
    <form id="sendMailForm" method="POST" action="{{ route('users.sendmail') }}">
        @csrf

        <table class="table table-sm table-compact table-bordered table-hover bg-white">
            <thead class="table-light">
                <tr>
                    <th style="width:1%"><input type="checkbox" id="selectAll"></th>
                    <th style="width:1%">No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date Registered</th>
                    <th class="text-center" style="width:120px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td><input type="checkbox" name="recipients[]" value="{{ $user->id }}" class="recipient-checkbox"></td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('M d, Y h:i A') }}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-outline-secondary me-1">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <button class="btn btn-sm btn-outline-danger" form="delete-user-{{ $user->id }}"
                                onclick="return confirm('Delete {{ $user->name }}?')">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">No users found.</td></tr>
                @endforelse
            </tbody>
        </table>

        <!-- Summary & Send Button -->
        <div class="d-flex justify-content-between align-items-center mt-3" style="font-size: 0.85rem;">
            <div class="small text-muted">
                Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries
            </div>
            <div class="pagination-wrapper small">
                {{ $users->links() }}
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="bi bi-send-fill"></i> Send Email to Selected
                </button>
            </div>
        </div>
    </form>

    <!-- Hidden DELETE Forms -->
    @foreach($users as $user)
        <form id="delete-user-{{ $user->id }}" method="POST" action="{{ route('users.destroy', $user) }}" class="d-none">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
</div>
@endsection

@push('head')
    <style>
        #loader {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(255,255,255,0.8);
            z-index: 9999;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
    </style>
@endpush

@push('scripts')
@if(session('emailSuccess'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Emails Sent',
        text: '{{ session('emailSuccess') }}',
        timer: 4000,
        showConfirmButton: false
    });
</script>
@endif

<script>
    const loader = document.getElementById('loader');
    const loaderMessage = document.getElementById('loaderMessage');
    const form = document.getElementById('sendMailForm');

    // Show loader on form submission with email-specific message
    form.addEventListener('submit', () => {
        loaderMessage.textContent = 'Sending email...';
        loader.style.display = 'flex';
    });

    // Show loader when the page first starts loading
    window.addEventListener('DOMContentLoaded', () => {
        loaderMessage.textContent = 'Loading records...';
        loader.style.display = 'flex';
    });

    // Hide loader once everything is rendered
    window.addEventListener('load', () => {
        loader.style.display = 'none';
    });

    // Checkbox logic
    document.getElementById('selectAll').addEventListener('change', function () {
        document.querySelectorAll('.recipient-checkbox')
                .forEach(cb => cb.checked = this.checked);
    });
</script>
@endpush
