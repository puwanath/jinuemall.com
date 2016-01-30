<?
$colors_arr=array("#1CA8DD","#1BC98E","#9F86FF","#E64759","#E4D836","#68C3A3","#D2527F","#D2D7D3");
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
        <h3 class="apb">Overview</h3>
      </div>

      <div class="apd">
        <div class="aok apf">
          <input type="text" value="01/01/15 - 01/08/15" class="form-control" data-provide="datepicker">
          <span class="bv ws"></span>
        </div>
        <span class="ape sn"></span>
        <div class="oa apf aph">
          <button type="button" class="ce apm">Day</button>
          <button type="button" class="ce apm active">Week</button>
          <button type="button" class="ce apm">Month</button>
        </div>
      </div>
    </div>

    <ul class="nav tq akx aks" role="tablist">
      <li class="active" role="presentation">
        <a href="#packages" role="tab" data-toggle="tab" aria-controls="traffic">Packages</a>
      </li>
      <li role="presentation">
        <a href="#sales" role="tab" data-toggle="tab" aria-controls="sales">Sales</a>
      </li>
      <li role="presentation">
        <a href="#support" role="tab" data-toggle="tab" aria-controls="support">Support</a>
      </li>
    </ul>

    <hr class="akq alo">

    <div class="oi">
      <div role="tabpanel" class="oj active" id="packages">
        <div class="fv db alf">
          <div class="gj alh">
            <div class="akn ald">
              <canvas
                class="ans"
                width="200" height="200"
                data-chart="doughnut"
                data-value="[
				<?
				$member_packages_query=mysql_query("SELECT package_name,COUNT(member_id) AS count_member
				FROM members 
				LEFT JOIN packages ON members.package_id=packages.package_id 
				GROUP BY packages.package_id 
				ORDER BY count_member
				");
				$i=0;
				while($member_packages=mysql_fetch_array($member_packages_query)){
					echo "{ value: ".$member_packages['count_member'].", color: '".$colors_arr[$i]."', label: '".$member_packages['package_name']."' },";
					$i++;
				}
				?>
				]"
                data-segment-stroke-color="#222">
              </canvas>
            </div>
            <strong class="dh">Packages</strong>
            <h3>Member package</h3>
          </div>
		  <div class="gj alh">
            <div class="akn ald">
              <canvas
                class="ans"
                width="200" height="200"
                data-chart="doughnut"
                data-value="[
				<?
				$member_ss_query=mysql_query("SELECT package_special,COUNT(member_id) AS count_member
				FROM members 
				GROUP BY package_special 
				ORDER BY count_member 
				");
				$i=1;
				while($member_ss=mysql_fetch_array($member_ss_query)){
					echo "{ value: ".$member_ss['count_member'].", color: '".$colors_arr[$i]."', label: '".$member_ss['package_special']."' },";
					$i++;
				}
				?>
				]"
                data-segment-stroke-color="#222">
              </canvas>
            </div>
            <strong class="dh">Member upgraded to</strong>
            <h3>Super starter</h3>
          </div>
          <div class="gj alh">
            <div class="akn ald">
              <canvas
                class="ans"
                width="200" height="200"
                data-chart="doughnut"
                data-value="[
				<?
				$member_status_query=mysql_query("SELECT member_status,COUNT(member_id) AS count_member
				FROM members 
				GROUP BY member_status 
				ORDER BY count_member DESC
				");
				$i=1;
				while($member_status=mysql_fetch_array($member_status_query)){
					echo "{ value: ".$member_status['count_member'].", color: '".$colors_arr[$i]."', label: '".$member_status['member_status']."' },";
					$i++;
				}
				?>
				]"
                data-segment-stroke-color="#222">
              </canvas>
            </div>
            <strong class="dh">Status</strong>
            <h3>Member active</h3>
          </div>
          
        </div>
      </div>

      <div role="tabpanel" class="oj" id="sales">
        <div class="aqm alh">
          <canvas
            class="ant"
            width="600" height="400"
            data-chart="line"
            data-scale-line-color="transparent"
            data-scale-grid-line-color="rgba(255,255,255,.05)"
            data-scale-font-color="#a2a2a2"
            data-labels="['','Aug 29','','','Sept 5','','','Sept 12','','','Sept 19','']"
            data-value="[{data: [2500, 3300, 2512, 2775, 2498, 3512, 2925, 4275, 3507, 3825, 3445, 3985]}]">
          </canvas>
        </div>
      </div>

      <div role="tabpanel" class="oj" id="support">
        <div class="aqm alh">
          <canvas
            class="ant"
            width="600" height="400"
            data-chart="bar"
            data-scale-line-color="transparent"
            data-scale-grid-line-color="rgba(255,255,255,.05)"
            data-scale-font-color="#a2a2a2"
            data-labels="['August','September','October','November','December','January','February']"
            data-value="[{ label: 'First dataset', data: [65, 59, 80, 81, 56, 55, 40] }, { label: 'Second dataset', data: [28, 48, 40, 19, 86, 27, 90] }]">
          </canvas>
        </div>
      </div>
    </div>

    <div class="anu akx akz">
      <h3 class="anv anw">Quick stats</h3>
    </div>

    <div class="fv aps alf akz ta te">
      <div class="gq gf apt akz">
        <h3 class="anh dj">
          $<?=number_format(mysql_result(mysql_query("SELECT SUM(expend) FROM transactions WHERE transaction='pay'"),0),2);?>
          <small class="anj ank"></small>
        </h3>
        <span class="ani">Sales packages</span>
      </div>
      <div class="gq gf apt akz">
        <h3 class="anh dm">
          $<?=number_format(mysql_result(mysql_query("SELECT SUM(income) FROM transactions WHERE transaction='receive'"),0),2);?>
          <small class="anj anl"></small>
        </h3>
        <span class="ani">Pay bonus</span>
      </div>
      <div class="gq gf apt akz">
        <h3 class="anh dj">
          $<?=number_format(mysql_result(mysql_query("SELECT SUM(jWallet) FROM members"),0),2);?>
          <small class="anj ank"></small>
        </h3>
        <span class="ani">J-Wallet</span>
      </div>
      <div class="gq gf apt akz">
        <h3 class="anh dj">
          $<?=number_format(mysql_result(mysql_query("SELECT SUM(rMoney) FROM members"),0),2);?>
          <small class="anj anl"></small>
        </h3>
        <span class="ani">R-Money</span>
      </div>
    </div>

    <hr class="akq alh">

    <div class="fv">
      <div class="gk alh">
        <div class="by">
          <h4 class="tx">
            Top members
          </h4>
          <?
		 $member_max_income=mysql_result(mysql_query("SELECT SUM(income) AS sum_income FROM transactions WHERE transaction_description!='received_transfer_jWallet' GROUP BY transactions.member_id ORDER BY sum_income DESC LIMIT 1"),0);
		 // $member_top_query=mysql_query("SELECT member_name,member_surname,jWallet+rMoney AS income FROM members ORDER BY income DESC LIMIT 10");
		$member_top_query=mysql_query("SELECT members.member_username,member_name,member_surname,SUM(income) AS sum_income FROM transactions LEFT JOIN members ON transactions.member_id=members.member_id WHERE transaction_description!='received_transfer_jWallet' GROUP BY transactions.member_id ORDER BY sum_income DESC LIMIT 10");
		  while($member_top=mysql_fetch_array($member_top_query)){
		  ?>
            <a class="pi" href="#">
              <span class="ty" style="width: <?=number_format(($member_top['sum_income']/$member_max_income)*100);?>%;"></span>
              <span class="dy dh">฿<?=number_format($member_top['sum_income']*35);?></span>
              <?=$member_top['member_name']."  ".$member_top['member_surname'];?>
            </a>
          <?
		  }
		  ?>
          
        </div>
        <a href="#" class="ce apm">All countries</a>
      </div>
      <div class="gk alh">
        <div class="by">
          <h4 class="tx">
            Recent members registered
          </h4>
          <?
		  $member_new_query=mysql_query("SELECT member_name,member_surname,member_registered,package_name 
		  FROM members 
		  LEFT JOIN packages ON members.package_id=packages.package_id
		  ORDER BY member_registered DESC LIMIT 10");
		  while($member_new=mysql_fetch_array($member_new_query)){
		  ?>
            <a class="pi" href="#">
              <span class="dy dh"><?=$member_new['package_name'];?></span>
			  <?=$member_new['member_name']."  ".$member_new['member_surname'];?>
            </a>
          <?
		  }
		  ?>
          
        </div>
        <a href="#" class="ce apm">View more</a>
      </div>
      <div class="gk alh">
        <div class="by">
          <h4 class="tx">
            Last members logined
          </h4>
          <?
		  $member_active_query=mysql_query("SELECT member_username,last_login
		  FROM members 
		  ORDER BY last_login DESC LIMIT 10");
		  while($member_active=mysql_fetch_array($member_active_query)){
		  ?>
            <a class="pi" href="#">
              <span class="dy dh"><?=$member_active['last_login'];?></span>
              <?=$member_active['member_username'];?>
            </a>
         <?
		  }
		  ?>
        </div>
        <a href="#" class="ce apm">View more</a>
      </div>
    </div>
	<div class="uc">
		  <div class="eg">
			<table class="cl" data-sort="table">
			  <thead>
				<tr>
				  <th>ID</th>
				  <th>Date</th>
				  <th>Member</th>
				  <th>Transaction</th>
				  <th>Income</th>
				</tr>
			  </thead>
			  <tbody>
				<?
				$transactions_sql="SELECT * FROM transactions LEFT JOIN members ON members.member_id=transactions.member_id ";
				$transactions_sql.="WHERE expend=0 ORDER BY transaction_date DESC LIMIT 200";
				$transactions_query=mysql_query($transactions_sql);
				while($transactions=mysql_fetch_array($transactions_query)){
				?>
				<tr>
				  <td><?=$transactions['transaction_id'];?></td>
				  <td><?=$transactions['transaction_date'];?></td>
				  <td><?=$transactions['member_name']."  ".$transactions['member_surname'];?></td>
				  <td><?=$transactions['transaction_description'];?></td>
				  <td><?=$transactions['income'];?></td>
				</tr>
				<?
				}
				?>
			  </tbody>
			</table>
		  </div>
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

