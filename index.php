<?php
mb_internal_encoding('UTF-8');
require "cypher.php";
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
    <div class="row" style="padding-top:2%">
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

    <div class="row" style="padding-top:1%" id="result">
        <section class="col-lg-5 offset-lg-1">
            <!-- one character -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-alt"></i>&nbsp; &nbsp;
                        <h3 class="card-title">One Character</h3>
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12" style="overflow:auto;padding-bottom:2%;">
                                    <table class="table table-striped table-bordered" style="text-align:center;font-size:small">

                                        <tr>
                                            <th scope="col">Occurence</th>
                                            <?php
                                            if(isset($_SESSION['character'])){
                                                foreach ($_SESSION['character'] as $key => $value) {

                                            ?>
                                                <td><?php echo $value . '.0'; ?></td>
                                            <?php }}?>
                                        </tr>

                                        <tr>
                                            <th scope="col">Letter in text</th>
                                            <?php
                                            if (isset($_SESSION['character'])) {
                                                foreach ($_SESSION['character'] as $key => $value) { ?>
                                                <td><?php echo $key; ?></td><?php
                                            } }?>
                                        </tr>

                                        <tr>
                                            <th scope="col">English letter</th>
                                            <td>E</td>
                                            <td>T</td>
                                            <td>A</td>
                                            <td>O</td>
                                            <td>I</td>
                                            <td>N</td>
                                            <td>S</td>
                                            <td>H</td>
                                            <td>R</td>
                                            <td>D</td>
                                            <td>L</td>
                                            <td>C</td>
                                            <td>U</td>
                                            <td>M</td>
                                            <td>W</td>
                                            <td>F</td>
                                            <td>G</td>
                                            <td>Y</td>
                                            <td>P</td>
                                            <td>B</td>
                                            <td>V</td>
                                            <td>K</td>
                                            <td>J</td>
                                            <td>X</td>
                                            <td>Q</td>
                                            <td>Z</td>
                                        </tr>

                                        <tr>
                                            <th scope="col">% English letter</th>
                                            <td>12.7</td>
                                            <td>9.1</td>
                                            <td>8.2</td>
                                            <td>7.5</td>
                                            <td>7.0</td>
                                            <td>6.7</td>
                                            <td>6.3</td>
                                            <td>6.1</td>
                                            <td>6.0</td>
                                            <td>4.3</td>
                                            <td>4.0</td>
                                            <td>2.8</td>
                                            <td>2.8</td>
                                            <td>2.4</td>
                                            <td>2.4</td>
                                            <td>2.2</td>
                                            <td>2.0</td>
                                            <td>2.0</td>
                                            <td>1.9</td>
                                            <td>1.5</td>
                                            <td>1.0</td>
                                            <td>0.8</td>
                                            <td>0.15</td>
                                            <td>0.15</td>
                                            <td>0.10</td>
                                            <td>0.07</td>
                                        </tr>

                                    </table>
                                    <form action="index.php" method="POST">
                                        <label for="p">Replace</label>
                                        <select name="replace" class="">
                                            <?php
                                            if (isset($_SESSION['character'])) {
                                                foreach ($_SESSION['character'] as $key => $value) {
                                                    if($value>0){
                                            ?>
                                                <option class="form-control" value="<?php echo $key; ?>"><?php echo $key; ?></option>
                                            <?php
                                            }}}
                                            ?>
                                        </select>
                                        <label for="p">with</label>
                                        <select name="with" class="">
                                            <?php
                                            for ($i = 0; $i < strlen($a); $i++) {
                                            ?>
                                                <option class="form-control" value="<?php echo strtolower($a[$i]); ?>"><?php echo strtolower($a[$i]); ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <button type="submit" name="swap" value="swap" class="btn btn-primary">swap</button>
                                    </form>

                                </div><br /> <br />
                                <p> Cypher Text : <br /> <?php if (isset($_SESSION['text'])){ echo $_SESSION['originalText'];}?> </p>
                                <div class="alert alert-light" role="alert">
                                    RESULT : <br /> <br />
                                    <p>
                                        <?php if (isset($_SESSION['text']) && isset($_POST['swap'])) {
                                            echo $_SESSION['text'];
                                        } ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!------ ------------------------------------------------------------------------------------------------>

        <section class="col-lg-5">
            <!-- two character -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-alt"></i>&nbsp; &nbsp;
                        <h3 class="card-title">Digraphs</h3>
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12" style="overflow:auto;padding-bottom:2%;">
                                    <table class="table table-striped table-bordered" style="text-align:center;font-size:small">

                                        <tr>
                                            <th scope="col">Occurence</th>
                                            <?php
                                            foreach ($counterdigraph as $show) { ?>
                                                <td><?php echo $show['nbredigraph'] . '.0'; ?></td><?php
                                                                                                } ?>
                                        </tr>

                                        <tr>
                                            <th scope="col">Letter in text</th>
                                            <?php
                                            foreach ($counterdigraph as $show) { ?>
                                                <td><?php echo $show['digraph']; ?></td><?php
                                                                                    } ?>
                                        </tr>

                                        <tr>
                                            <th scope="col">English digraph</th>
                                            <td>TH</td>
                                            <td>HE</td>
                                            <td>IN</td>
                                            <td>ER</td>
                                            <td>AN</td>
                                            <td>RE</td>
                                            <td>ND</td>
                                            <td>AT</td>
                                            <td>ON</td>
                                            <td>NT</td>
                                            <td>HA</td>
                                            <td>ES</td>
                                            <td>ST</td>
                                            <td>EN</td>
                                            <td>ED</td>
                                            <td>TO</td>
                                            <td>IT</td>
                                            <td>OU</td>
                                            <td>EA</td>
                                            <td>HI</td>
                                            <td>IS</td>
                                            <td>OR</td>
                                        </tr>

                                        <tr>
                                            <th scope="col">% English digraph</th>
                                            <td>1.52</td>
                                            <td>1.28</td>
                                            <td>0.94</td>
                                            <td>0.94</td>
                                            <td>0.82</td>
                                            <td>0.68</td>
                                            <td>0.63</td>
                                            <td>0.59</td>
                                            <td>0.57</td>
                                            <td>0.56</td>
                                            <td>0.56</td>
                                            <td>0.56</td>
                                            <td>0.55</td>
                                            <td>0.55</td>
                                            <td>0.53</td>
                                            <td>0.52</td>
                                            <td>0.50</td>
                                            <td>0.50</td>
                                            <td>0.47</td>
                                            <td>0.46</td>
                                            <td>0.46</td>
                                            <td>0.43</td>
                                        </tr>

                                    </table>
                                    <form action="index.php" method="POST">
                                        <label for="p">Replace</label>
                                        <select name="replace" class="">
                                            <?php
                                            for ($i = 0; $i < strlen($a); $i++) {
                                            ?>
                                                <option class="form-control" value="<?php echo $a[$i]; ?>"><?php echo strtoupper($a[$i]); ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="p">with</label>
                                        <select name="with" class="">
                                            <?php
                                            for ($i = 0; $i < count($b); $i++) {
                                            ?>
                                                <option class="form-control" value="<?php echo $b[$i]; ?>"><?php echo strtolower($b[$i]); ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <button type="submit" name="analyse" value="analyse" class="btn btn-primary">swap</button>
                                    </form>

                                </div><br />
                                <div class="alert alert-light" role="alert">
                                    RESULT : <br /> <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <!-- RESULT -->

    <footer style="margin-left:3%;margin-right:3%;padding-bottom:auto" class="main-footer">
        <center>2020 © GABRIEL KALALA 21811863 - Cyprus International University </center>
    </footer>

    <script src="dist/js/bootstrap.js"></script>
    <script src="dist/js/pages/dashboard.js"></script>
    <script src="dist/js/demo.js"></script>
</body>

</html>