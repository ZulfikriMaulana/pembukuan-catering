<!-- <section class="content-header">
  <h1>
	Data
	<small>Data </small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Dashboard</li>
  </ol>
</section>

<section class="content">
  <div class="row">
	<section class="col-lg-12">
	  <div class="box box-info">

		<div class="box-header">
		  <h3 class="box-title">Tambah Data</h3>		
		</div>
		<div class="box-body">
     
		</div>
	  </div>
	</section>
  </div>
</section> -->


<section class="content-header">
  <h1>
    Dashboard
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>


<section class="content">

  <div class="row">

    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-green">
        <div class="inner">
          <?php
          require_once('./class/class.transaksi.php');
          $objTransaksi = new Transaksi();

          $data = $objTransaksi->LihatPemasukanHariini()
          ?>
          <h4 style="font-weight: bolder"><?php echo "Rp. " . number_format($data['total_pemasukan']) . " ,-" ?></h4>
          <p>Pemasukan Hari Ini</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-blue">
        <div class="inner">
          <?php
          $data = $objTransaksi->LihatPemasukanBulanini()
          ?>
          <h4 style="font-weight: bolder"><?php echo "Rp. " . number_format($data['total_pemasukan']) . " ,-"
                                          ?></h4>
          <p>Pemasukan Bulan Ini</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-orange">
        <div class="inner">
          <?php
          $data = $objTransaksi->LihatPemasukanTahunini()
          ?>
          <h4 style="font-weight: bolder"><?php echo "Rp. " . number_format($data['total_pemasukan']) . " ,-"
                                          ?></h4>
          <p>Pemasukan Tahun Ini</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-black">
        <div class="inner">
          <?php
          $data = $objTransaksi->LihatPemasukanSeluruh()
          ?>
          <h4 style="font-weight: bolder"><?php echo "Rp. " . number_format($data['total_pemasukan']) . " ,-"
                                          ?></h4>
          <p>Seluruh Pemasukan</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>

    <!-------------------------Card Pengeluaran----------------------------------->

    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-red">
        <div class="inner">
          <?php
          $data = $objTransaksi->LihatPengeluaranHariini()
          ?>

          <h4 style="font-weight: bolder"><?php echo "Rp. " . number_format($data['total_pengeluaran']) . " ,-" ?></h4>
          <p>Pengeluaran Hari Ini</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-red">
        <div class="inner">
          <?php
          $data = $objTransaksi->LihatPengeluaranBulanini()
          ?>

          <h4 style="font-weight: bolder"><?php echo "Rp. " . number_format($data['total_pengeluaran']) . " ,-" ?></h4>
          <p>Pengeluaran Bulan Ini</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-red">
        <div class="inner">
          <?php
          $data = $objTransaksi->LihatPengeluaranTahunini()
          ?>

          <h4 style="font-weight: bolder"><?php echo "Rp. " . number_format($data['total_pengeluaran']) . " ,-"
                                          ?></h4>
          <p>Pengeluaran Tahun Ini</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-black">
        <div class="inner">
          <?php
          $data = $objTransaksi->LihatPengeluaranSeluruh()
          ?>
          <h4 style="font-weight: bolder"><?php echo "Rp. " . number_format($data['total_pengeluaran']) . " ,-"
                                          ?></h4>
          <p>Seluruh Pengeluaran</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>

  </div>

  <!-- /.row -->
  <!-- Main row -->
  <div class="row">

    <!-- Left col -->
    <section class="col-lg-8">

      <div class="nav-tabs-custom">

        <ul class="nav nav-tabs pull-right">
          <!-- <li><a href="#tab2" data-toggle="tab">Pemasukan</a></li> -->
          <li class="active"><a href="#tab1" data-toggle="tab">Pemasukan & Pengeluaran</a></li>
          <li class="pull-left header">Grafik</li>
        </ul>

        <div class="tab-content" style="padding: 20px">

          <div class="chart tab-pane active" id="tab1">


            <h4 class="text-center">Grafik Data Pemasukan & Pengeluaran Per <b>Bulan</b></h4>
            <canvas id="grafik1" style="position: relative; height: 300px;"></canvas>

            <br />
            <br />
            <br />

            <h4 class="text-center">Grafik Data Pemasukan & Pengeluaran Per <b>Tahun</b></h4>
            <canvas id="grafik2" style="position: relative; height: 300px;"></canvas>

          </div>
          <div class="chart tab-pane" id="tab2" style="position: relative; height: 300px;">
            b
          </div>
        </div>

      </div>

    </section>
    <!-- /.Left col -->


    <section class="col-lg-4">


      <!-- Calendar -->
      <div class="box box-solid bg-green-gradient">
        <div class="box-header">
          <i class="fa fa-calendar"></i>
          <h3 class="box-title">Kalender</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <!--The calendar -->
          <div id="calendar" style="width: 100%"></div>
        </div>
        <!-- /.box-body -->
      </div>


    </section>
    <!-- right col -->
  </div>
  <!-- /.row (main row) -->
</section>

<script>
  $(document).ready(function() {

    // $(".edit").hide();

    $('#table-datatable').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': true,
      'ordering': false,
      'info': true,
      'autoWidth': true,
      "pageLength": 50
    });



  });

  $('#datepicker').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
  }).datepicker("setDate", new Date());

  $('.datepicker2').datepicker({
    autoclose: true,
    format: 'yyyy/mm/dd',
  });
</script>


<script>
  var randomScalingFactor = function() {
    return Math.round(Math.random() * 100)
  };

  var barChartData = {
    labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
    datasets: [{
        label: 'Pemasukan',
        fillColor: "rgba(51, 240, 113, 0.61)",
        strokeColor: "rgba(11, 246, 88, 0.61)",
        highlightFill: "rgba(220,220,220,0.75)",
        highlightStroke: "rgba(220,220,220,1)",
        data: [
          <?php
          $data = $objTransaksi->LihatGrafikPemasukanPerbulan();
          echo $data;
          ?>
        ]
      },
      {
        label: 'Pengeluaran',
        fillColor: "rgba(255, 51, 51, 0.8)",
        strokeColor: "rgba(248, 5, 5, 0.8)",
        highlightFill: "rgba(151,187,205,0.75)",
        highlightStroke: "rgba(151,187,205,1)",
        data: [
          <?php
          $data = $objTransaksi->LihatGrafikPengeluaranPerbulan();
          echo $data;
          ?>
        ]
      }
    ]

  }


  var barChartData2 = {
    labels: ["2023"
      <?php /*
        $tahun = mysqli_query($koneksi, "select distinct year(transaksi_tanggal) as tahun from transaksi order by year(transaksi_tanggal) asc");
        while ($t = mysqli_fetch_array($tahun)) {
        ?> "<?php echo $t['tahun']; ?>",
        <?php
        } */
      ?>
    ],
    datasets: [{
        label: 'Pemasukan',
        fillColor: "rgba(51, 240, 113, 0.61)",
        strokeColor: "rgba(11, 246, 88, 0.61)",
        highlightFill: "rgba(220,220,220,0.75)",
        highlightStroke: "rgba(220,220,220,1)",
        data: [
          <?php
          $data = $objTransaksi->LihatGrafikPemasukanPertahun();
          echo $data;
          ?>
        ]
      },
      {
        label: 'Pengeluaran',
        fillColor: "rgba(255, 51, 51, 0.8)",
        strokeColor: "rgba(248, 5, 5, 0.8)",
        highlightFill: "rgba(151,187,205,0.75)",
        highlightStroke: "rgba(254, 29, 29, 0)",
        data: [
          <?php
          $data = $objTransaksi->LihatGrafikPengeluaranPertahun();
          echo $data;
          ?>
        ]
      }
    ]

  }



  window.onload = function() {
    var ctx = document.getElementById("grafik1").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData, {
      responsive: true,
      animation: true,
      barValueSpacing: 5,
      barDatasetSpacing: 1,
      tooltipFillColor: "rgba(0,0,0,0.8)",
      multiTooltipTemplate: "<%= datasetLabel %> - Rp.<%= value.toLocaleString() %>,-"
    });

    var ctx = document.getElementById("grafik2").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData2, {
      responsive: true,
      animation: true,
      barValueSpacing: 5,
      barDatasetSpacing: 1,
      tooltipFillColor: "rgba(0,0,0,0.8)",
      multiTooltipTemplate: "<%= datasetLabel %> - Rp.<%= value.toLocaleString() %>,-"
    });







  }
</script>