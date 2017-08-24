<?php require("includes/header.php");?>
  <div class="wrapper wrapper-content">
   <div class="container">
  <div class="row">
  <div class="col-lg-12">
  <div  class="col-lg-6" style="font-weight:bol">
  <center>
 <h1>Congratulations! The game has ended.</h1>
  <h3 style="font-weight:bold">Thank you for playing.</h3>
  <br><br>
  <h2>Your Stats</h2>
  <table>
    <tr><td style="font-weight:bold;padding-right:20px;">Score</td><td><?php echo $stats->score; ?></td></tr>
    <tr><td style="font-weight:bold;padding-right:20px;">Questions Solved</td><td><?php echo ($stats->question);?></td></tr>
    <tr><td style="font-weight:bold;padding-right:20px;">Skipped</td><td><?php echo $stats->skips;?></td></tr>
    <tr><td style="font-weight:bold;padding-right:20px;">Time Taken To Solve</td><td>
    <?php 
    $startTime=strtotime($event_start_time->game_start_time);
    $time=strtotime($stats->last_solved);
    $completed_time=$time-$startTime;
    echo $completed_time=secondsToTime($completed_time);

      ?></td></tr>
  </table>
</center> 
  </div>
  <div class="col-lg-6">
  <center>
 
  <img width="50%"  src="<?php echo BASE_URI.'templates/images/leader1.png';?>">
  <?php if(!empty($leaderBoard)):
  ?>
  <table>
  <thead><td style="text-align:center;padding:10px;font-family:'century gothic';font-size:15px;font-weight:bold">User</td>
  <td style="text-align:center;padding:10px;font-family:'century gothic';font-size:15px;font-weight:bold">Points</td></thead>
  <?php $i=0;foreach($leaderBoard as $leader):
  if($i==3) break;?>

  <tr>
  <td style=" padding:10px;font-family:'century gothic';font-size:15px;font-weight:bold" ><?php $i++; echo $leader->email_id;?>
  </td>
  <td style="text-align:center;padding:10px;font-family:'century gothic';font-size:15px;font-weight:bold"><?php echo $leader->score;?></td>
  </tr>
  <?php endforeach;?>

  </table>
  <a id="leaderBoard" data-toggle="modal" data-target="#myModal" href="#" style="margin-top:10px;font-weight:bold;width:200px !important;" class="btn btn-block btn-outline btn-danger">See All</a>
<?php endif;?>
  
  
  <div style="padding-top:20px;">
    <h1>Useful Links</h1>
    
    <a target="_blank" href="https://www.facebook.com/events/170834436689173/" class="btn btn-block btn-outline btn-danger" style="margin-top:10px;font-weight:bold;width:200px !important;">Facebook Discussion....</a>

  </div>
  </center>
  </div>
  </div>
  </div>
 </div>
</div>
<div class="modal inmodal in" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <!-- <i class="fa fa-laptop modal-icon"></i> -->
                <h4 class="modal-title">Leader Board</h4>
                <small class="font-bold"></small>
            </div>
           
            <div  class="modal-body">
      <div id="product_spinner" class="sk-spinner sk-spinner-double-bounce">
                <div class="sk-double-bounce1"></div>
                <div class="sk-double-bounce2"></div>
            </div>
            <table style="word-break:break-all;" cellspacing="0" cellpadding="0" width="100%" >
             <thead style="font-weight:bold"><td>Rank</td><td>Name</td><td style="text-align:right;">Score</td><td style="text-align:right;">Solved</td><td style="text-align:center">Completed In</td></thead> 
             <tbody id="modal_product_body"></tbody>
            </table>
           
            </div>
           
           
        </div>
    </div>
</div>
               
        <?php require("includes/footer.php");?>
        <script>
$(document).ready(function(){
$("#leaderBoard").click(function(){
console.log('hello');
$.ajax({
url:"javascript_activities.php",
type:"POST",
data:"tag=leaderBoard",
beforeSend:function(){},
success:function(data){
console.log('hello');
  $("#product_spinner").css('display','none');
$("#modal_product_body").html(data);
//console.log($("input[name='product_id']").val());
}
});
});});
        </script>