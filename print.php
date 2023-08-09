<?php
session_start();
include("connection.php");
?>

<?php
$order_id = $_GET['order_id'];
$sql = "SELECT * FROM product_order INNER JOIN user ON product_order.session_id = user.user_id WHERE order_id='$order_id'";

$query = mysqli_query($connection, $sql);
$data = mysqli_fetch_assoc($query);
if (isset($_GET['order_id']) && !empty($_GET)) {
  if ($data['order_id'] < 1) {
    $alert = '<script type="text/javascript">';
    $alert .= 'alert("ไม่พบข้อมูล กรุณากรอกใหม่อีกครั้ง");';
    //$alert .='window.location.href = "pharmacy_lot_add.php";';
    $alert .= '</script>';
    echo $alert;
  }
}
?>

<?php include("include/timeth.php"); ?>
<?php
$sql2 = "SELECT * FROM order_detail
                          INNER JOIN product_order ON order_detail.order_id = product_order.order_id
                          INNER JOIN stock ON order_detail.product_id = stock.product_id                       
                          WHERE order_detail.order_id=" . $_GET['order_id'] . " ";
$query2 = mysqli_query($connection, $sql2);
$dateData = time();
?>
<!DOCTYPE html>
<html>
<title>รายละเอียดประมาณการจัดซื้อครุภัณฑ์ สายพลาธิการ เลขที่เอกสาร&nbsp;&nbsp<?php echo $data['order_id']; ?></title>
<?php include("include/head.php"); ?>

<!--   <script>
  function printDiv(printablediv) {
    var print_h = document.getElementById('print_h').style.display = 'block';
    var print_b = document.getElementById('print_b').style.display = 'block';
    var printContents = document.getElementById(printablediv).innerHTML;     
    var originalContents = document.body.innerHTML;       
    document.body.innerHTML = printContents,print_h,print_b;      
    window.print();      
    document.body.innerHTML = originalContents;
    document.getElementById('print_h').style.display = 'none';
    document.getElementById('print_b').style.display = 'none';
   }
</script> -->
<style type="text/css">
  @media print {
    #hid {
      display: none;
      /* ซ่อน  */
    }

    table,
    td,
    tr,
    th {
      font-family: AngsanaUPC;
      font-size: 18px;
      color: #000000;
      border-color: rgb(0, 0, 0);
    }
  }
</style>

<body>




  <form method="post" name="form1" id="form1">
    <div id="printablediv">

      <!-- หัวรายงาย start-->
      <div id="print_h">
        <p style="text-align: center;">
          <span style="color:#000000;font-family: TH SarabunPSK, sans-serif;font-size: 28px;"><b></b></span>
        </p>

        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#" style="padding-bottom: 90px;padding-top: 10px;">


          <div class="sidebar-brand-text mx-3">
            <span style="color: #000000;font-family: TH SarabunPSK, sans-serif;font-size: 28px; margin-bottom: 0px;"><b>รายละเอียดรายการครุภัณฑ์ สายพลาธิการ<br><center><?php echo $data['user_belong']; ?></center></b></span>
            <ul class="" style="margin-bottom: -100px;"></ul>
            <span style="color: #212529;font-family: TH SarabunPSK, sans-serif;font-size: 15.6px;"></span>
          </div>
        </a>
      </div>
      <!-- หัวรายงาย end-->


      <div class="row">
        <div class="col">
          <div class="table-responsive">
            <table class="table table-borderless table-sm">
              <tr>

                <th style="text-align:left;" width="10%">เลขที่เอกสาร</th>
                <td style="text-align:left;" width="5%"><?php echo $data['order_id']; ?></td>
                <th style="text-align:left;" width="10%">ชื่อรายการ</th>
                <td style="text-align:left;" width="30%"><?php echo $data['order_name']; ?></td>
                <th style="text-align:left;" width="5%"><b>วันที่</b></th>
                <td style="text-align:left;" width=""><?php echo thai_date_fullmonth(strtotime($data['order_date'])); ?></td>
                <th style="text-align:left;" width="5%"><b>ยอดรวม</b></td>
                  <center>
                <td style="text-align:left;" width="10%"><?= number_format($data['order_total'], 2) ?></td>
                </center>
                <th style="text-align:left;" width="5%"><b>บาท</b></td>

              </tr>

            </table>
          </div>
        </div>

      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-sm align-middle">
          <thead>
            <tr style="background: #f8f9fc;">
              <th style="text-align:center;" width="3%">ลำดับ</th>
              <th style="text-align:center;" width="11%">หมายเลขพัสดุ</th>
              <th style="text-align:center;">รายการ</th>
              <th style="text-align:center;" width="9%">จำนวน</th>
              <th style="text-align:center;" width="10%">หน่วยนับ</th>
              <th style="text-align:center;" width="10%">ราคา</th>
              <th style="text-align:center;" width="10%">ราคารวม</th>
              <th style="text-align:center;" width="18%">หมายเหตุ</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 0;
            foreach ($query2 as $data1) : $no++
            ?>
              <?php $total2 = 0;
              $total2 += $data1['detail_total']; ?>
              <tr>
                <td>
                  <center><?= $no ?></center>
                </td>
                <td>
                  <center><?= $data1['product_id'] ?></center>
                </td>
                <td><?= $data1['product_name'] ?></td>
                <td>
                  <center><?= $data1['detail_qty'] ?></center>
                </td>
                <td>
                  <center><?= $data1['product_unit'] ?></center>
                </td>
                <td>
                  <center> <?php $total1 = $data1['detail_total'] / $data1['detail_qty'];
                            echo number_format($total1, 0); ?></center>
                </td>
                <td>
                  <center><?= number_format($data1['detail_total'], 0) ?></center>
                </td>
                <td><?= $data1['product_attribute'] ?></td>


              <?php endforeach; ?>

              <tr style='background: #f8f9fc;'>
                <td colspan='3' align='center'><b>รวมมูลค่าทั้งสิ้น&nbsp;(เป็นราคารวมภาษีมูลค่าเพิ่ม&nbsp;7%)</b></td>
                <td colspan='5' align='center'><b><?= number_format($data['order_total'], 0) ?> บาท</b></td>
              </tr>
          </tbody>
        </table>
      </div>

      <!-- ชื่อผู้พิม-เวลาพิม start  -->
      <div class="row" id="print_b">
        <div class="row">
          &nbsp;<br>
          &nbsp;<br>
        </div>
        <div class="sidebar-brand-text mx-3">
          <table style="width:100%">
            <tr>
              <div style="font-family: Sarabun;font-size: 14px;text-align:right;width:90.3%;"><b>ผู้ขอประมาณการ</b>&nbsp;&nbsp;<?= $_SESSION["name"] ?></div>
              <div style="font-family: Sarabun;font-size: 14px;text-align:right;width:89.3%;"><b>วันที่พิมพ์</b>&nbsp;&nbsp;<?php echo thai_date_fullmonth($dateData); ?></div>
            </tr>
          </table>
        </div>


      </div>
      <!-- ชื่อผู้พิม-เวลาพิม end  -->
      <center>
        <button id="hid" onclick="window.print()" class="btn btn-sm btn-success" style="width: 80px;"> พิมพ์ </button>
        <button id="hid" class="btn btn-primary btn-sm" type="button" onclick="window.location='user_order_status.php';" style="width: 80px;">ย้อนกลับ</button>
      </center>
    </div>
  </form>
  <?php
  $act = $_GET['print'];
  if ($act == 'print') {
    $alert = '<script type="text/javascript">';
    $alert .= 'window.print()';
    $alert .= '</script>';
    echo $alert;
  }
  $alert2 = '<script type="text/javascript">';
  $alert2 .= 'window.onafterprint = function () {';
  $alert2 .= 'window.location="user_order_status.php"}';
  // $alert2 .='history.back(-2)}';
  $alert2 .= '</script>';
  echo $alert2;
  ?>


  </div>
  </div>
  </div>
  </div>
  <?php include("include/script.php"); ?>
</body>

</html>
</body>

</html>