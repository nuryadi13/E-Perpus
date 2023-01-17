<?php include "conn.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Perpustakaan Kita</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Perpustakaan Berbasis Web">
    <meta name="keywords" content="Perpustakaan, perpus, online, website">
    <meta name="perpustakaanku" content="PerpustakaanKU" />
    <!-- bootstrap 3.0.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
        // 1 detik = 1000
        window.setTimeout("waktu()", 1000);

        function waktu() {
            var tanggal = new Date();
            setTimeout("waktu()", 1000);
            document.getElementById("output").innerHTML = tanggal.getHours() + ":" + tanggal.getMinutes() + ":" + tanggal.getSeconds();
        }
    </script>
    <script language="JavaScript">
        var tanggallengkap = new String();
        var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
        namahari = namahari.split(" ");
        var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
        namabulan = namabulan.split(" ");
        var tgl = new Date();
        var hari = tgl.getDay();
        var tanggal = tgl.getDate();
        var bulan = tgl.getMonth();
        var tahun = tgl.getFullYear();
        tanggallengkap = namahari[hari] + ", " + tanggal + " " + namabulan[bulan] + " " + tahun;

        var popupWindow = null;

        function centeredPopup(url, winName, w, h, scroll) {
            LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
            TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
            settings = 'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ',resizable'
            popupWindow = window.open(url, winName, settings)
        }
    </script>

    <style type="text/css">

    </style>
</head>

<body class="skin-black" >
    <!-- header logo: style can be found in header.less -->
    <header class="header">
        <a href="login.html" class="logo">
            Perpustakaan Kita
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="messages-menu">
                        <table width="1000">
                            <tr>
                                <td width="200">
                                    <div class="Tanggal">
                                        <h4>
                                            <script language="JavaScript">
                                                document.write(tanggallengkap);
                                            </script>
                                    </div>
                                    </h4>
                                </td>
                                <td align="left" width="30"> - </td>
                                <td align="left" width="620">
                                    <h4>
                                        <div id="output" class="jam"></div>
                                    </h4>
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li class="dropdown messages-menu"  style="background-color:greenyellow">
                        <a href="#" data-toggle="modal" data-target="#contact">
                            <i class="fa fa-envelope"></i>
                            <!--<span class="label label-success">4</span>-->
                        </a>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="login.html" data-placement="bottom" data-toggle="tooltip" title="Login" style="background-color:greenyellow">
                            <i class="fa fa-user"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->

        <aside>

            <!-- Main content -->
            <section class="content">

                <!-- Main row -->
                <div class="row">
                    <div>
                        <button style="background-color:greenyellow; margin-left :20px; font-size : 20px;"> <a href="login.html">Login</a></button>
                    </div>
                    

                    <div class="col-md-12">
                        <section class="panel">
                            <header class="panel-heading data"  style="text-align:center; background-color:green; color:white; margin-top:20px;">
                                <b>Thank you for visiting</b>
                            </header>
                            <div>
                                    <img src="img/logo.png" width="300px" height="auto" style="display: block; margin-left: auto; margin-right: auto; margin-top:10px;">
                            </div>
                            <div class="panel-body table-responsive">
                                <?php
                                $tanggal = date("Y/m/d");
                                $query1 = "select * from pengunjung where tgl_kunjung='$tanggal'";
                                $tampil = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                ?>
                                
                                <hr />
                                <?php $tampil = mysqli_query($conn, "select * from pengunjung where tgl_kunjung='$tanggal'");
                                $user = mysqli_num_rows($tampil);
                                ?>
                               
                                <div>
                                    <img src="img/download.webp" width="100%" height="auto" >
                                 </div>
                            </div>
                             <div class="footer-main" style="background-color:green; color:white;">
                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-c-square" viewBox="0 0 16 16">
  <path d="M8.146 4.992c-1.212 0-1.927.92-1.927 2.502v1.06c0 1.571.703 2.462 1.927 2.462.979 0 1.641-.586 1.729-1.418h1.295v.093c-.1 1.448-1.354 2.467-3.03 2.467-2.091 0-3.269-1.336-3.269-3.603V7.482c0-2.261 1.201-3.638 3.27-3.638 1.681 0 2.935 1.054 3.029 2.572v.088H9.875c-.088-.879-.768-1.512-1.729-1.512Z"/>
  <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2Zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2Z"/>
</svg>
                                    Perpustakaan Kita 2022
                            </div>
                        </section>


                    </div>
                    <!--end col-6 -->
                    
            
    <!-- row end -->
    <!-- /.content -->
   
    </aside><!-- /.right-side -->

    </div><!-- ./wrapper -->

    <!-- Modal Dialog Contact -->
    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel" style="text-align:center; background-color:green; color:white;">Perpustakaan Kita</h4>
                </div>
                <div class="modal-body"style="background-color:aqua; font-family:times new roman;>
                    <p style="background-color:aqua; font-family:times new roman; text-align:center;">Web ini kami buat untuk memenuhi tugas Akhir Semester 5 Mata Kuliah Kriptografi</p>
                        <h3 style="background-color:aqua; font-family:times new roman;">Kelompok 6</h3>
                        <h3 style="background-color:aqua; font-family:times new roman;">Anggota Kelompok :</h3>
                        <h4 style="background-color:aqua; font-family:times new roman;">-Nuryadi</h4>
                        <h4 style="background-color:aqua; font-family:times new roman;">-Marlina</h4>
                        <br style="background-color:aqua; font-family:times new roman;">
                    <p>Terima kasih telah membaca buku yang telah kami sediakan semoga bermanfaat!!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:green; color:white;">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end dialog modal -->


    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="js/jquery.min.js" type="text/javascript"></script>

    <!-- jQuery UI 1.10.3 -->
    <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

    <script src="js/plugins/chart.js" type="text/javascript"></script>

    <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
    <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- calendar -->
    <script src="js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

    <!-- Director App -->
    <script src="js/Director/app.js" type="text/javascript"></script>

    <!-- Director dashboard demo (This is only for demo purposes) -->
    <script src="js/Director/dashboard.js" type="text/javascript"></script>

    <!-- Director for demo purposes -->
    <script type="text/javascript">
        $('input').on('ifChecked', function(event) {
            // var element = $(this).parent().find('input:checkbox:first');
            // element.parent().parent().parent().addClass('highlight');
            $(this).parents('li').addClass("task-done");
            console.log('ok');
        });
        $('input').on('ifUnchecked', function(event) {
            // var element = $(this).parent().find('input:checkbox:first');
            // element.parent().parent().parent().removeClass('highlight');
            $(this).parents('li').removeClass("task-done");
            console.log('not');
        });
    </script>
    <script>
        $('#noti-box').slimScroll({
            height: '400px',
            size: '5px',
            BorderRadius: '5px'
        });

        $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
            checkboxClass: 'icheckbox_flat-grey',
            radioClass: 'iradio_flat-grey'
        });
    </script>
    <script type="text/javascript">
        $(function() {
            "use strict";
            //BAR CHART
            var data = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data, {
                responsive: true,
                maintainAspectRatio: false,
            });

        });
        // Chart.defaults.global.responsive = true;
    </script>
</body>

</html>