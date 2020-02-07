<div style="padding: 10px;background-color: #fff;box-shadow: 0px 0px 10px #eee;">
  <div class="container-fluid">
       <form method="POST" action="search_data.php">
         <div class="row">
         <div class="col-sm-5">
           <a href="index.php"><img src="aa.png" style="width:40px"></a> <span style="font-family: poppins">Ahrvo Block Explorer</span>
         </div>

         <div class="col-sm-3">
           <input type="text" style="font-size: 12px" class="form-control" name="content" placeholder="Search Tx">
         </div>
         <div class="col-sm-2">
           <select class="form-control" name="type" style="padding: 5px;font-size: 12px;">
            <option>Block No.</option>
            <option>Transaction Hash</option>
           </select>
         </div>
         <div class="col-sm-2">
           <button type="submit" class="btn btn-sm btn-success">Search Now</button>
         </div>
       </div>
       </form>
    </div>
  </div>