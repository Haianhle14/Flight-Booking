<?php include_once 'header.php'; ?><!-- log on to codeastro.com for more projects -->
<?php include_once 'footer.php'; ?>
<?php require '../helpers/init_conn_db.php'; ?>

<link rel="stylesheet" href="../assets/css/flight_form.css">
<link rel="stylesheet" href="../assets/css/form.css">

<?php if(isset($_SESSION['adminId'])) { ?>

<style>
  input {
    border :0px !important;
    border-bottom: 2px solid #5c5c5c !important;
    /* color :cornflowerblue !important; */
    border-radius: 0px !important;
    font-weight: bold !important;
    background-color: whitesmoke !important;    
  }
  *:focus {
    outline: none !important;
  }
  label {
    /* color : #79BAEC !important; */
    color: #5c5c5c !important;
    font-size: 19px;
  }
  h5.form-name {
    /* color: cornflowerblue; */
    /* font-family: 'Courier New', Courier, monospace; */
    font-weight: 50;
    margin-bottom: 0px !important;
    margin-top: 10px;
  }
  h1 {
    font-size: 45px !important;
    font-family: 'Arial';  
    margin-bottom: 20px;  
  }
  body {
    /* padding-top: 20px; */
    /* background-image: url('../assets/images/bg5.jpg'); */
    background-color: #efefef;
    /* background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;     */
  }
  div.form-out {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  
    background-color: whitesmoke !important;
    padding: 40px;
    margin-top: 30px;
  }
  select.airline {
    float: right;
    font-weight: bold !important;
    /* color :cornflowerblue !important; */
  }
  @media screen and (max-width: 900px){
    body {
      background-color: lightblue;
      background-image: none;
    }
    div.form-out {
    padding: 20px;
    background-color: none !important;
    margin-top: 20px;
  }    
}  
</style>
<main>
<div class="container mt-0">
  <div class="row">
    
      <div class="bg-light form-out col-md-12">
      <h1 class="text-secondary text-center">Thống Kê Vé</h1>

      <form method="POST" class=" text-center" action="statistical_ticket.php">

        <div class="form-row mb-4">
          <div class="col-md-3 p-0">
            <h5 class="mb-0 form-name">Từ Ngày</h5>
          </div>
          <div class="col">    
            <input type="date" name = "source_date" class="form-control"
            required >
          </div>
          <div class="col">         
            <input type="time" name = "source_time" class="form-control"
              required >
          </div>
        </div>


        <div class="form-row mb-4">
        <div class="col-md-3 ">
            <h5 class="form-name mb-0">Đến Ngày</h5>
          </div>          
          <div class="col">
            <input type="date" name = "dest_date" class="form-control"
            required >
          </div>
          <div class="col">
            <input type="time" name = "dest_time" class="form-control"
            required >
          </div>
        </div>  

        <button name="flight_but" type="submit" 
          class="btn btn-success mt-5">
          <div style="font-size: 1.5rem;">
          <i class="fa fa-lg fa-arrow-right"></i> Tìm
          </div>
        </button>
      </form>
    </div>
    </div>
</div>
</main>
<script>
$(document).ready(function(){
  $('.input-group input').focus(function(){
    me = $(this) ;
    $("label[for='"+me.attr('id')+"']").addClass("animate-label");
  }) ;
  $('.input-group input').blur(function(){
    me = $(this) ;
    if ( me.val() == ""){
      $("label[for='"+me.attr('id')+"']").removeClass("animate-label");
    }
  }) ;
});
</script>
<?php } ?>
