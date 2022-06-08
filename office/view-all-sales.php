<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

if(isset($_GET['filter']))
{
    $showTitleNameOfTransactions = "Today Transactions : ".$todayDate."";
}
else
{
    $showTitleNameOfTransactions = "All Transactions";
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <title>All Sales - Pragma</title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-4">Transactions</h5>
                        <ol class="breadcrumb mb-3">
                            <li class="breadcrumb-item active"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item"><?php echo $showTitleNameOfTransactions; ?></li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Transactions
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

                                        <?php include('functions/all-transactions.php'); ?>
                                                                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include('footer.php'); ?>