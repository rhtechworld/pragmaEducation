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
        <title>Cource Tabs | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Course Tabs</h3>
                        <?php include('functions/course-tabs-actions.php'); ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active">Course Tabs</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="CourseTabsList" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>TabID</th>
                                            <th>CourseTabName</th>
                                            <th>Courses</th>
                                            <th>Status</th>
                                            <th>LastUpdated</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include('functions/course-tabs-list.php'); ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               <script>
                   //data tables StudentsList
                    var StudentList = $('#CourseTabsList').DataTable( {
                    lengthChange: false,
                    dom: 
                    "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    buttons: [ 'excel', 'pdf', 'print', 'colvis' ]
                    } );

                    table.buttons().container()
                    .appendTo( '#CourseTabsList_wrapper .col-md-6:eq(0)' );
               </script>
               
