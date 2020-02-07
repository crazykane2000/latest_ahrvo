<div style="background-color: #000a31;box-shadow: 0px 0px 10px #eee;">
  <?php $data = file_get_contents("http://13.233.7.230:3003/api/dataManager/explorer");
    $data = json_decode($data,true);
    //echo count($data);
    //print_r($data);
    $count=0;

    foreach ($data as $key => $value) {
      $count+=count($value['transactions']);
    }

   $timestamp= $data[1]['timestamp']-$data[0]['timestamp'];
   $stats= count($data)." -- ".$count." -- ".$timestamp;
   //echo $stats;
   $stats = explode(" -- ", $stats);
   //print_r($stats);
  ?>
    <div class="container-fluid">
       <div class="row">
         <div class="col-sm-6" style="background-image: url(https://tokyotechie.com/images/slide3elem.png);">
           <div style="padding: 30px"></div>
         </div>
         <div class="col-sm-6">
           <div style="padding: 13px;background-color: #02124e;margin-top: 30px;border-top-left-radius: 10px">
             <div class="row">
              <div class="col-sm-1"></div>
               <div class="col-sm-3">
                  <div style="padding: 25px;">
                    <div style="border-left: solid 4px #112880;padding: 10px">
                      
                      <a href="show_all_tx.php" style="color: #fff;"><div style="color: #fff;font-size: 24px;"><?php echo $count; ?></div></a>
                      <div style="color: #b0c0ff;font-size: 13px;">Total Transactions</div>
                    </div>
                  </div>
               </div>
               <div class="col-sm-3">
                  <div style="padding: 25px;">
                    <div style="border-left: solid 4px #112880;padding: 10px">
                      
                      <a hrefr="show_all_blocks.php"><div style="color: #fff;font-size: 24px;"><?php echo count($data); ?></div></a>
                      <div style="color: #b0c0ff;font-size: 13px;">Total Blocks</div>
                    </div>
                  </div>
               </div>

               <div class="col-sm-5">
                  <div style="padding: 25px;">
                    <div style="border-left: solid 4px #112880;padding: 10px">
                      
                      <div style="color: #fff;font-size: 24px;">~<?php echo abs(number_format((float)($timestamp/1000000000/60), 2, '.', '')); ?> Min</div>
                      <div style="color: #b0c0ff;font-size: 13px;">Average Time</div>
                    </div>
                  </div>
               </div>

             </div>
           </div>
         </div>
       </div>
    </div>
  </div>