<?php
mb_internal_encoding('UTF-8');
//require "cypher.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FREQUENCY ANALYSIS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed" style="background: #ddd;">
    <div class="row" style="padding-top:3%">
        <section class="col-lg-6 offset-lg-3 connectedSortable">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-alt"></i>&nbsp; &nbsp;
                        <h3 class="card-title">FREQUENCY ANALYSIS</h3>
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="index.php" method="POST">
                                    <div class="form-group">
                                        <label for="p">Text</label>
                                        <textarea class="form-control" name="text" required id="p" rows="5"></textarea>
                                    </div>
                                    <center>
                                        <button type="submit" name="analyse" value="analyse" class="btn btn-primary">Analysis</button>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div><!-- /.card-body -->


    <!-- RESULT -->

    <footer style="margin-left:3%;margin-right:3%;padding-bottom:auto" class="main-footer">
        <center>2020 © GABRIEL KALALA 21811863 - Cyprus International University </center>
    </footer>

    <script src="dist/js/bootstrap.js"></script>
    <script src="dist/js/pages/dashboard.js"></script>
    <script src="dist/js/demo.js"></script>
</body>

</html>