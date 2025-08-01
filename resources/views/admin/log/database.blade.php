@extends('layouts.admin')

@section('title', 'Log - Database')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-success">Database Log</h6>
                    <button class="btn btn-sm btn-light">
                        <i class="fas fa-download me-1"></i> Download Log
                    </button>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Halaman untuk melihat log database.
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Timestamp</th>
                                    <th>Operation</th>
                                    <th>Table</th>
                                    <th>Query</th>
                                    <th>Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2024-01-15 10:30:15</td>
                                    <td><span class="badge bg-primary">SELECT</span></td>
                                    <td>users</td>
                                    <td>SELECT * FROM users WHERE id = 1</td>
                                    <td>2.5ms</td>
                                </tr>
                                <tr>
                                    <td>2024-01-15 10:29:45</td>
                                    <td><span class="badge bg-success">INSERT</span></td>
                                    <td>artikels</td>
                                    <td>INSERT INTO artikels...</td>
                                    <td>5.2ms</td>
                                </tr>
                                <tr>
                                    <td>2024-01-15 10:28:30</td>
                                    <td><span class="badge bg-warning">UPDATE</span></td>
                                    <td>gurus</td>
                                    <td>UPDATE gurus SET...</td>
                                    <td>3.1ms</td>
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