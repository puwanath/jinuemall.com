<?
$colors_arr=array("#1CA8DD","#1BC98E","#9F86FF","#E64759","#E4D836","#68C3A3","#D2D7D3");
$member_search=$_REQUEST['search'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>
      
        Dashboard &middot; JINIUS
      
    </title>

    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
    
      <link href="<?=$dir;?>/dashboard/css/toolkit-inverse.css" rel="stylesheet">
    
    
    <link href="<?=$dir;?>/dashboard/css/application.css" rel="stylesheet">

    <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      body {
        width: 1px;
        min-width: 100%;
        *width: 100%;
      }
    </style>
  </head>


<body>
<div class="aot">
	<?
	include "navigation.php";
	?>
	<div class="bw">
		<div class="aoz">
		  <div class="apa">
			<h6 class="apc">Dashboards</h6>
			<h2 class="apb">Members</h2>
		  </div>

		  <div class="oc apd">
			<div class="tm aok">
			  <input type="text" value="01/01/15 - 01/08/15" class="form-control" data-provide="datepicker">
			  <span class="bv ws"></span>
			</div>
		  </div>
		</div>

		<div class="akf ud">
		  <div class="akg akh">
			<form action="" method="get">
			<div class="tm aok">
			  <input type="text" name="search" class="form-control aqp" placeholder="Search members" value="<?=$member_search;?>">
			  <span class="bv adm"></span>
			</div>
			</form>
		  </div>
		  <div class="akg">
			<div class="oa">
			  <button type="button" class="ce apm">
				<span class="bv aey"></span>
			  </button>
			  <button type="button" class="ce apm">
				<span class="bv zy"></span>
			  </button>
			</div>
		  </div>
		</div>

		<div class="uc">
		  <div class="eg">
			<table class="cl" data-sort="table">
			  <thead>
			  
				<tr>
				  <th><input type="checkbox" class="aqi" id="selectAll"></th>
				  <th>#ID</th>
				  <th>Fullname</th>
				  <th>Username</th>
				  <th>Package</th>
				  <th>Sponsor</th>
				  <th>Upline</th>
				</tr>
			  </thead>
			  <tbody>
				<?
				$members_sql="SELECT * FROM members LEFT JOIN packages ON members.package_id=packages.package_id ";
				if($member_search!=""){
				$members_sql.="WHERE member_name LIKE '%$member_search%' OR member_surname LIKE '%$member_search%' OR member_username LIKE '%$member_search%' ";
				}
				$members_sql.="ORDER BY member_username LIMIT 100";
				$members_query=mysql_query($members_sql);
				while($members=mysql_fetch_array($members_query)){
				?>
				<tr>
				  <td><input type="checkbox" class="aqj"></td>
				  <td><a href="#">#<?=$members['member_id'];?></a></td>
				  <td><?=$members['member_name']."  ".$members['member_surname'];?></td>
				  <td><?=$members['member_username'];?></td>
				  <td><?=$members['package_name'];?></td>
				  <td><?=mysql_result(mysql_query("SELECT member_username FROM members WHERE member_id=".$members['sponsor']),0);?></td>
				  <td><?=mysql_result(mysql_query("SELECT member_username FROM members WHERE member_id=".$members['upline']),0);?></td>
				</tr>
				<?
				}
				?>
			  </tbody>
			</table>
		  </div>
		</div>

		<div class="db">
		  <ul class="ox">
			<li>
			  <a href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
			  </a>
			</li>
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li>
			  <a href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			  </a>
			</li>
		  </ul>
		</div>
	</div>
</div>


    <script src="<?=$dir;?>/dashboard/js/jquery.min.js"></script>
    <script src="<?=$dir;?>/dashboard/js/chart.js"></script>
    <script src="<?=$dir;?>/dashboard/js/tablesorter.min.js"></script>
    <script src="<?=$dir;?>/dashboard/js/toolkit.js"></script>
    <script src="<?=$dir;?>/dashboard/js/application.js"></script>
    <script>
      // execute/clear BS loaders for docs
      $(function(){while(window.BS&&window.BS.loader&&window.BS.loader.length){(window.BS.loader.pop())()}})
    </script>
  </body>
</html>

