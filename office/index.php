<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/dashboard-analytics.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <title>Dashboard - Pragma</title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Students : <b><?php echo number_format($getCuntOnfindTotalStudentsFromDb); ?></b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="students-list">View All Students</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Today Sales : <b><?php echo number_format($getCntoffindTotalSalesTodayFromDb); ?></b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="view-all-sales?filter=<?php echo $todayDate; ?>">View Today Sales</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Total Sales : <b><?php echo number_format($getCntoffindTotalSalesFromDb); ?></b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="view-all-sales">View All Sales</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Total INR : <b>₹ <?php echo number_format($thoTotalAmountShowInDashboard,2); ?></b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="view-all-sales">View All Sales</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Recent 10 Txns.
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Txn Date</th>
                                            <th>TxnId</th>
                                            <th>RazorPay PaymentId</th>
                                            <th>Student Email</th>
                                            <th>Paid Amount</th>
                                            <th>Pay Status</th>
                                            <th>Assign Id</th>
                                            <th>Enrolled Course</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php include('functions/dashboard-transactions.php'); ?>
                                                                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include('footer.php'); ?>