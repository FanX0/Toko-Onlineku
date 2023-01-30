@extends('layouts.admin')

@section('title')index.html
Store Dashboard
@endsection

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Admin Dashboard</h2>
            <p class="dashboard-subtitle">This is Admin Pages</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Customer</div>
                            <div class="dashboard-card-subtitle">15,209</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Revenue</div>
                            <div class="dashboard-card-subtitle">$15,209</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Transaction</div>
                            <div class="dashboard-card-subtitle">22,409,399</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 mt-2">
                    <h5 class="mb-3">Recent Transaction</h5>
                    <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="/images/dashboard-icon-p1.png" alt="" />
                                </div>
                                <div class="col-md-4">Sirup Marjan</div>
                                <div class="col-md-3">May Saroh</div>
                                <div class="col-md-3">22-01-2023</div>
                                <div class="col-md-1 d-none d-md-block">
                                    <img src="/images/dashboard-arrow-right.svg" alt="" />
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="/images/dashboard-icon-p2.png" alt="" />
                                </div>
                                <div class="col-md-4">Meja</div>
                                <div class="col-md-3">Sapa dias</div>
                                <div class="col-md-3">22-02-2023</div>
                                <div class="col-md-1 d-none d-md-block">
                                    <img src="/images/dashboard-arrow-right.svg" alt="" />
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="/images/dashboard-icon-p3.png" alt="" />
                                </div>
                                <div class="col-md-4">Sofaa ku</div>
                                <div class="col-md-3">joko Susanto</div>
                                <div class="col-md-3">22-03-2023</div>
                                <div class="col-md-1 d-none d-md-block">
                                    <img src="/images/dashboard-arrow-right.svg" alt="" />
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection