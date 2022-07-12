<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Announcements | <?php echo $ProjectName; ?></title>
    <?php include('header.php'); ?>
    <main>
        <div class="container-fluid px-4">
            <h5 class="mt-4">Pragma Announcements</h5>
            <hr>
            <div class="row mt-2">
                <div class="card p-3">
                    <?php include('functions/student-access-announcemets.php'); ?>
                </div>
            </div>
        </div>
    </main>
    <?php include('footer.php');