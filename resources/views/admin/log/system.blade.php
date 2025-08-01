@extends('layouts.admin')

@section('title', 'Log - System')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-success">System Log</h6>
                    <button class="btn btn-sm btn-light">
                        <i class="fas fa-download me-1"></i> Download Log
                    </button>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Halaman untuk melihat log sistem Laravel.
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Timestamp</th>
                                    <th>Level</th>
                                    <th>Message</th>
                                    <th>Context</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2024-01-15 10:30:15</td>
                                    <td><span class="badge bg-info">INFO</span></td>
                                    <td>User login successful</td>
                                    <td>Auth</td>
                                </tr>
                                <tr>
                                    <td>2024-01-15 10:25:30</td>
                                    <td><span class="badge bg-warning">WARNING</span></td>
                                    <td>Database connection slow</td>
                                    <td>Database</td>
                                </tr>
                                <tr>
                                    <td>2024-01-15 10:20:45</td>
                                    <td><span class="badge bg-success">SUCCESS</span></td>
                                    <td>File uploaded successfully</td>
                                    <td>File</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 