<?php include_once 'helpers/helper.php'; ?>

<?php subview('header.php'); ?>
<link rel="stylesheet" href="assets/css/login.css">
<style>
@font-face {
  font-family: 'product sans';
  src: url('assets/css/Product Sans Bold.ttf');
}
h1{
   font-family :'product sans' !important;
	font-size:48px !important;
	margin-top:20px;
	text-align:center;
}
body {
  background: #bdc3c7;  /* dự phòng cho các trình duyệt cũ */
  background: -webkit-linear-gradient(to right, #2c3e50, #bdc3c7);  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #2c3e50, #bdc3c7); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}
.login-form {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  
    border-radius: 0px;
}
</style>
<div class="flex-container">
    <div class="login-form mt-5" style="height: 350px;">
        <h1 class="text-center text-secondary mb-4">Reset mật khẩu</h1>
        <div class="alert text-center alert-info mb-0" 
            style="margin-left: 60px; margin-right:60px;" role="alert">   
            Một email sẽ được gửi cho bạn kèm theo hướng dẫn cách đặt lại mật khẩu.
        </div>
        <form method="POST" action="includes/reset-request.inc.php">            
            <div class="flex-container">             
                <div>
                    <i class="fa fa-envelope text-primary"></i>
                </div>
                <div>
                    <input type="text" name="user_email" 
                        placeholder="Nhập email-id đã đăng ký của bạn" class="form-input" required>
                </div>
            </div>
            <div class="submit">
            <button name="reset-req-submit" type="submit" class="button">
                Submit</button>                    
            </div>
        </form>                          
    </div>
</div>
<?php
if(isset($_GET['err']) || isset($_GET['mail'])) {
    if($_GET['err'] === 'invalidemail') {
        echo '<script>alert("Email không hợp lệ");</script>';
    } else if($_GET['err'] === 'sqlerr') {
        echo '<script>alert("Đã xảy ra lỗi");</script>';        
    } else if($_GET['mail'] === 'success') {
        echo '<script>alert("Email đã được gửi thành công tới bạn");</script>';        
    } else if($_GET['err'] === 'mailerr') {
        echo '<script>alert("Đã xảy ra lỗi");</script>';        
    }                    
} 
?>
<?php subview('footer.php'); ?> 

