<!DOCTYPE html>
<html>
<style>
.pointer {cursor: pointer;}
</style>
<body style="font-family: Sarabun, sans-serif;border-style: none;">
    <header>
    <div class="center">
    <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top" style="background-color: #000033;transform: translate(0px);opacity: 1;margin: 0px;margin-bottom:30px;border-style: none;height: 600;">
    <br><center><img src="upload/rtaf.png"alt="EasyJung"style="width: 200px;" ></center><br>
    
            <div class="container-fluid">
            <center><a class="navbar-brand d-xxl-flex justify-content-xxl-center align-items-xxl-center" href="#" style="color: #FFFFFF;font-family: Sarabun, sans-serif;font-weight: bold;text-align: left;margin: 0px;padding: 100px;">บัญชีมาตรฐานครุภัณฑ์ สายพลาธิการ</a></center>
                
<!-- Modal -->
            <div class="modal fade" id="modallogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <center>
            <div class="modal-header">
                <h5 class="modal-title"  id="exampleModalLabel" style="color: #FFFFFF"><span class="fas fa-fingerprint"></span>  เข้าสู่ระบบ</h5>  
            </div>
            <div class="modal-body">
                 <form class="form-horizontal text-nowrap" action="checkuser.php" method="post" id="insert" enctype= "multipart/form-data">
            <div class="row mb-3">
                

            <div class="col-xl-12">
            <input type="text"  name="username" class="form-control form-control-sm" required placeholder="ชื่อผู้ใช้" />
            </div>
<br>
            <div class="col-xl-12">
            <input type="password" name="Password" class="form-control form-control-sm" required placeholder="รหัสผ่าน" />
            </div>

            
                    
</center>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <center>
            <button class="btn btn-sm btn-success" type="submit" name="add"  style="width: 80px;">เข้าสู่ระบบ</button>
            <!--<button class="btn btn-danger btn-sm" type="button" onclick="$('#modallogin').modal('hide');" style="width: 80px;">ยกเลิก</button> -->
            </center>
        </div>
    </div>
</form>
</div>
</div>
</div>

<!-- Modal -->
                <!--เมนู-->
                
        </nav>
    </header>
    

<!-- Modal 
<div class="modal fade" id="modallogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <center>
            <div class="modal-header">
                <h5 class="modal-title"  id="exampleModalLabel"><span class="fas fa-fingerprint"></span>  เข้าสู่ระบบ</h5>
                
            </div>
            <div class="modal-body">
            <form class="form-horizontal text-nowrap" action="checkuser.php" method="post" id="insert" enctype= "multipart/form-data">
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-group mb-3"><label class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control form-control-sm" name="username" />
                    </div>
                    <div class="form-group mb-3"><label class="form-label">รหัสผ่าน</label>
                    <input type="password" class="form-control form-control-sm" name="password" />
                </div>
</center>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <center>
            <button class="btn btn-sm btn-success" type="submit" name="add"  style="width: 80px;">เข้าสู่ระบบ</button>
            <button class="btn btn-danger btn-sm" type="button" onclick="$('#modallogin').modal('hide');" style="width: 80px;">ยกเลิก</button>
            </center>
        </div>
    </div>
</form>
</div>
</div>
</div>

Modal -->


</body>
</html>