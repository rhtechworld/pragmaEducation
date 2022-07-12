<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/get-annpuncement-view.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Announcement View | <?php echo $ProjectName; ?></title>
    <?php include('header.php'); ?>
    <main>
        <div class="container-fluid px-4">
            <h5 class="mt-4"><a href="announcements">Announcements</a> : <?php echo $ann_title; ?></h5>
            <hr>
            <div class="row mt-2">
                <div class="card p-3">
                   <g style="font-size:12px;color:#C5C5C5"><?php echo $last_updated; ?></g>
                   <h5 class="mt-1"><?php echo $ann_title; ?></h5>
                   <p>
                        <?php echo $ann_desc; ?>
                   </p>
                </div>
            </div>
        </div>
    </main>
    <?php include('footer.php');