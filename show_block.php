<!DOCTYPE html>
<html lang="en">
<head>
  <title>Block Scanner</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <style type="text/css">
    @media 
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {

      /* Force table to not be like tables anymore */
      table, thead, tbody, th, td, tr { 
        display: block; 
      }
      
      /* Hide table headers (but not display: none;, for accessibility) */
      thead tr { 
        position: absolute;
        top: -9999px;
        left: -9999px;
      }
      
      tr { border: 1px solid #ccc; }
      
      td { 
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #eee; 
        position: relative;
        padding-left: 50%; 
      }
      
      td:before { 
        /* Now like a table header */
        position: absolute;
        /* Top/left values mimic padding */
        top: 6px;
        left: 6px;
        width: 45%; 
        padding-right: 10px; 
        white-space: nowrap;
      }
      
      
    }

    .box{
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0px 0px 10px #eee;
      font-family: poppins;
    }
  </style>
</head>
<body style="background-color: #f4f4f4">
  
    <?php include 'header.php'; ?>
    <?php include 'gabar.php'; ?>
<div style="padding: 30px"></div>
<?php
function relativeTime($time) {
            $d[0] = array(1,"Sec");
            $d[1] = array(60,"Min");
            $d[2] = array(3600,"hr");
            $d[3] = array(86400,"Day");
            $d[4] = array(604800,"W");
            $d[5] = array(2592000,"Mon");
            $d[6] = array(31104000,"Yr");

            $w = array();

            $return = "";
            $now = time();
            $diff = ($now-$time);
            $secondsLeft = $diff;

            for($i=6;$i>-1;$i--)
            {
                 $w[$i] = intval($secondsLeft/$d[$i][0]);
                 $secondsLeft -= ($w[$i]*$d[$i][0]);
                 if($w[$i]!=0)
                 {
                    $return.= abs($w[$i]) . " " . $d[$i][1] . (($w[$i]>1)?'s':'') ." ";
                 }

            }
            $return .= ($diff>0)?"ago":"left";
            return $return;
        }

  $data = file_get_contents("http://13.233.7.230:3003/api/dataManager/explorer");
    $data = json_decode($data,true);
    //print_r($data);
    $datav = array();
    foreach ($data as $key => $value) {
      if ($_REQUEST['block_id']==$value['number']) {
        $datav = $value;
      }
    }
 ?>
  <div class="container" >
    <div class="row">
      <div class="col-sm-8">
        <div class="box">
          <h6>Block Details</h6>
          <div style="padding: 20px;"></div>
          <b>Block Height: <?php echo $datav['number']; ?></b>
          <div style="padding: 10px;"></div>

          <div class="row" style="font-size: 12px;color: #999">
            <div class="col-sm-3">
              <span><?php echo count($datav['transactions']); ?> Transaction</span>
            </div>
            <div class="col-sm-2">
              <span><?php echo count($datav['size']); ?> bytes</span>
            </div>
            <div class="col-sm-7">
              <span><?php echo $datav['time']; ?></span>
            </div>
          </div>

          <div style="padding: 10px;"></div>
          <table class="table" style="font-size: 12px;">
            <tr>
              <td style="background-color: #e1e7ff">Block No.</td>
              <td><?php echo $datav['number']; ?></td>
            </tr>

            <tr>
              <td style="background-color: #e1e7ff">Block Difficulty</td>
              <td><?php echo $datav['blockDifficulty']; ?></td>
            </tr>

            <tr>
              <td style="background-color: #e1e7ff">Tx Hash Count</td>
              <td><?php echo count($datav['transactions']); ?></td>
            </tr>

            <tr>
              <td style="background-color: #e1e7ff">GasLimit</td>
              <td><?php echo $datav['gasLimit']; ?></td>
            </tr>

            <tr>
              <td style="background-color: #e1e7ff">blockHash</td>
              <td style="word-break: break-all"><?php echo $datav['blockHash']; ?></td>
            </tr>

            <tr>
              <td style="background-color: #e1e7ff">parentHash</td>
              <td><?php echo $datav['parentHash']; ?></td>
            </tr>

            <tr>
              <td style="background-color: #e1e7ff">receiptsRoot</td>
              <td><?php echo $datav['receiptsRoot']; ?></td>
            </tr>

            <tr>
              <td style="background-color: #e1e7ff">sha3Uncles</td>
              <td><?php echo $datav['sha3Uncles']; ?></td>
            </tr>

            <tr>
              <td style="background-color: #e1e7ff">size</td>
              <td><?php echo $datav['size']; ?></td>
            </tr>

           

            <tr>
              <td style="background-color: #e1e7ff">totalDifficulty</td>
              <td><?php echo $datav['totalDifficulty']; ?></td>
            </tr>

            <tr>
              <td style="background-color: #e1e7ff">transactionsRoot</td>
              <td><?php echo $datav['transactionsRoot']; ?></td>
            </tr>

            <tr>
              <td style="background-color: #e1e7ff">time</td>
              <td><?php //GMT
              $time = explode("T", $datav['time']);
             // print_r($time);
              $time_set = explode(".", $time[1]);
              echo $time[0]." ".$time_set[0]." GMT"; ?></td>
            </tr>


           </table>

        </div>
      </div>
      <div class="col-sm-4">
        <div class="box" style="background-color: #0a1647;color: #fff;font-size: 12px;word-break:break-all;height: 720px;">
          <h6 style="color: #fff;opacity: .8">Block Details</h6>
          <div style="padding: 10px;"></div>
          <b>stateRoot</b> : <br/><?php echo $datav['stateRoot']; ?>
          <div style="padding: 10px;"></div>
        </div>
      </div>
    </div>

    <div style="padding: 20px;"></div>
    <div class="row">
      <div class="col-sm-12">
        <div class="box">
           <h6>Transactions</h6>
           <div style="padding: 10px;"></div>
           <!-- <div style="font-size: 12px;color: #999;padding: 10px;background-color: #e1e7ff"></div> -->
            <?php //echo $datav['transactions'][0];
              $dodo = $datav['transactions'];
             ?>
              <?php foreach ( $dodo as $key => $value) {             
               // echo "http://13.233.7.230:3003/api/dataManager/get/transactionDetails?_txhash=".$value;
              $data = file_get_contents("http://13.233.7.230:3003/api/dataManager/get/transactionDetails?_txhash=".$value);              
              $data = json_decode($data,true);
              //print_r($data);

              echo '<div class="col-sm-12" style="margin-top:13px;">
                  <div style="padding: 10px;border:solid 1px #eee;border-radius: 4px;border-left: solid 4px #b1cffd;font-size: 12px;">
                    <div class="row">
                      <div class="col-sm-9">
                        <div style="padding: 6px;">
                          <a href="show_tx_2.php?id='.$data['result']['transactionHash'].'"><h6 style="cursor:pointer;color:#007bff;word-break: break-all;font-size:15px;" class="openBtn" data-id="'.$data['result']['transactionHash'].'" >'.$data['result']['transactionHash'].'</h6></a>
                        </div>
                        <div style="padding: 10px;background-color: #f5f5f5;font-family: arial;color: #888">
                          '.$data['result']['from'].' >  '.$data['result']['to'].'<br/>

                          <b>Gas Used </b> : '.hexdec($data['result']['gasUsed']).', <b>Tx Fees </b> : '.hexdec($data['result']['cumulativeGasUsed']).'
                        </div>
                      </div>
                      <div class="col-sm-3" style="text-align:right">
                        <h6><span style="color:#999">Block # : </span><a href="show_block.php?block_id='.hexdec($data['result']['blockNumber']).'">'.hexdec($data['result']['blockNumber']).'</a></h6>
                      </div>
                    </div>
                  </div>
                </div>';
            } ?>
            

             
           
        </div>
      </div>
    </div>
  </div>


  <?php include 'footer.php'; ?>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

</body>
</html>
