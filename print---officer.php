<?php
session_start();
include("connection.php");
?>

<?php
$order_id = $_GET['order_id'];
$sql = "SELECT * FROM product_order INNER JOIN user ON product_order.session_id = user.user_id
        WHERE order_id='$order_id'";

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
  .print-header,
  .print-header-space {
    height: 70px;
    margin-top: 0;
    margin-bottom: 0;
  }

  .signature p {
    font-family: TH SarabunPSK, sans-serif;
    font-size: 20px;
    font-weight: bold;
    text-align: center;
    margin-top: 0;
    margin-bottom: 0;

  }

  .print-header {
    font-family: TH SarabunPSK, sans-serif;
    font-size: 24px;
    font-weight: bold;
    position: fixed;
    top: 0;
    text-align: center;
    width: 100%;
  }

  .print-header p {
    text-align: center;
    margin-bottom: 0;
    margin-top: 0;
  }

  tr .noBorder td {
    border: 0;
  }

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
      <!-- <div id="print_h">
        <p style="text-align: center;">
          <span style="color:#000000;font-family: TH SarabunPSK, sans-serif;font-size: 28px;"><b></b></span>
        </p>

        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#" style="padding-bottom: 60px;padding-top: 10px;">


          <div class="sidebar-brand-text mx-3">
            <span style="color: #000000;font-family: TH SarabunPSK, sans-serif;font-size: 28px; margin-bottom: 0px;"><b>รายละเอียดประมาณการจัดซื้อครุภัณฑ์ สายพลาธิการ</b></span>
            <ul class="" style="margin-bottom: -100px;"></ul>
            <span style="color: #212529;font-family: TH SarabunPSK, sans-serif;font-size: 15.6px;"></span>
          </div>
        </a>
      </div> -->
      <!-- หัวรายงาย end-->
      <div class="print-header">
        <p>รายละเอียดประมาณการจัดซื้อครุภัณฑ์ สายพลาธิการ</p>
        <p><?php echo $data['user_belong']; ?></p>
      </div>

      <div class="row">
        <div class="col">
          <div class="table-responsive">
            <table class="table table-borderless table-xxl">
              <!--         <tr>
                          
                            <th style="text-align:left;" width="10%">เลขที่เอกสาร</th>
                            <td style="text-align:left;" width="15%"><?php echo $data['order_id']; ?></td>
                            <th style="text-align:left;" width="15%"><b>วันที่</b></th>
                            <td style="text-align:left;" width=""><?php echo thai_date_fullmonth(strtotime($data['order_date'])); ?></td>
                            <th style="text-align:left;" width="10%"><b>ยอดรวม</b></td>
                            <td style="text-align:left;" width="10%"><?= number_format($data['order_total'], 2) ?></td>
                            <th style="text-align:left;" width="10%"><b>บาท</b></td>
                            
                          </tr> -->

            </table>
          </div>
        </div>

      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-sm align-middle" style="overflow:hidden;">
          <thead>
          <center>
              <tr style="border:0;" class="noBorder">
                <td style="border:0;">
                  <div class="print-header-space">&nbsp;</div>
                </td>
              </tr>
            </center>
            <tr style="background: #FFFFFF;">
              <th rowspan="2" style="text-align:center;" width="2%" valign="middle">ลำดับ</th>
              <th rowspan="2" style="text-align:center;" width="10%" valign="middle">หมายเลขพัสดุ</th>
              <th rowspan="2" style="text-align:center;" valign="middle">รายการ</th>
              <th rowspan="2" style="text-align:center;" width="4%" valign="middle">จำนวน</th>
              <th rowspan="2" style="text-align:center;" width="6%" valign="middle">หน่วยนับ</th>
              <th colspan="2" style="text-align:center;" width="10%" valign="middle">ค่าพัสดุ</th>
              <th colspan="2" style="text-align:center;" width="10%" valign="middle">ค่าแรง</th>
              <th colspan="2" style="text-align:center;" width="10%" valign="middle">ค่าพัสดุและค่าแรง</th>
            <tr>
              <th style="text-align:center;" width="8%" valign="middle">ราคาหน่วยละ</th>
              <th style="text-align:center;" width="7%" valign="middle">จำนวนเงิน</th>
              <th style="text-align:center;" width="8%" valign="middle">ราคาหน่วยละ</th>
              <th style="text-align:center;" width="7%" valign="middle">จำนวนเงิน</th>
              <th style="text-align:center;" width="7%" valign="middle">รวมเป็นเงิน</th>
              <th style="text-align:center;" width="15%" valign="middle">หมายเหตุ</th>
            </tr>
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
                <td align='right'> <?php $total1 = $data1['detail_total'] / $data1['detail_qty'];
                                    echo number_format($total1, 0); ?></td>
                <td align='right'><?= number_format($data1['detail_total'], 0) ?></td>
                <td>
                  <center>-</center>
                </td>
                <td>
                  <center>-</center>
                </td>
                <td align='right'><?= number_format($data1['detail_total'], 0) ?></td>
                <td><?= $data1['product_attribute'] ?></td>


              <?php endforeach; ?>
              <tr style='background: #FFFFFF;'>
                <td colspan='3' align='center'><b>รวมมูลค่าทั้งสิ้น&nbsp;(เป็นราคารวมภาษีมูลค่าเพิ่ม&nbsp;7%)</b></td>
                <td colspan='5' align='center'><b id="bahttext"><?= number_format($data['order_total']) ?></b></td>
                <td colspan='3' align='center'><b><?= number_format($data['order_total']) ?> บาท</b></td>
              </tr>


          </tbody>
        </table>
      </div>
      <br>
      <br>
      <br>

      <!-- ชื่อผู้พิม-เวลาพิม start  -->
      <div class="container signature">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4"></div>

          <div class="col-md-4 ml-auto">
            <p style="margin-left:-200px;">ขอรับรองว่าถูกต้อง</p>
            <p style="margin-left:-100px;">น.ท.</p>
            <p>(วินัตย์ คูชัย)</p>
            <p>หน.ผจง.กพพ.พธ.ทอ.</p>
            <p id="approve-date"><?php echo thai_date_short($dateData); ?></p>
          </div>
        </div>
      </div>

  </form>
  <script type="text/javascript" src="assets/js/BAHTTEXT.min.js"></script>

<script type="text/javascript">
  let date = document.getElementById('approve-date').innerText;
  let arr_date = date.split(" ");
  arr_date[2] = arr_date[2].substring(2, 4);
  document.getElementById('approve-date').innerText = arr_date[1] + arr_date[2];
  let text_baht = document.getElementById('bahttext');
  let number = text_baht.innerText;
  let textbaht_value = BAHTTEXT(number);
  text_baht.innerText = textbaht_value;

</script>
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
  $alert2 .= 'window.location="okstatus_officer.php"}';
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