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
      
        Jinue &middot; Dashboard theme &middot; Official Bootstrap Themes
      
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
  <div class="bw">
    <div class="fv">
      <div class="gf aol">
        <nav class="aos">
          <div class="aom">
            <button class="amx amy aon" type="button" data-toggle="collapse" data-target="#nav-toggleable-sm">
              <span class="ct">Toggle nav</span>
            </button>
            <a class="aoo cn" href="">
              <span class="bv acs aop"></span>
            </a>
          </div>

          <div class="collapse anc" id="nav-toggleable-sm">
            <form class="aoq">
              <input class="form-control" type="text" placeholder="Search...">
              <button type="submit" class="fm">
                <span class="bv adm"></span>
              </button>
            </form>
            <ul class="nav og nav-stacked">
              <li class="tp">Dashboards</li>
              <li >
                <a href="">Overview</a>
              </li>
              <li class="active">
                <a href="order-history">Order history</a>
              </li>
              <li >
                <a href="fluid">Fluid layout</a>
              </li>
              <li >
                <a href="icon-nav">Icon nav</a>
              </li>

              <li class="tp">More</li>
              <li >
                <a href="docs">
                  Toolkit docs
                </a>
              </li>
              <li>
                <a href="http://getbootstrap.com" target="blank">
                  Bootstrap docs
                </a>
              </li>
              <li >
                <a href="light">Light UI</a>
              </li>
              <li>
                <a href="#docsModal" data-toggle="modal">
                  Example modal
                </a>
              </li>
            </ul>
            <hr class="rx akx">
          </div>
        </nav>
      </div>
      <div class="hd apr">
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
    <div class="tm aok">
      <input type="text" class="form-control aqp" placeholder="Search orders">
      <span class="bv adm"></span>
    </div>
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
          <th></th>
          <th>Fullname</th>
          <th>Username</th>
          <th>Register</th>
          <th>Package</th>
          <th>Price bath (*30)</th>
        </tr>
      </thead>
      <tbody>
		<?
		$members_query=mysql_query("SELECT * FROM members LEFT JOIN packages ON members.package_id=packages.package_id ORDER BY member_username");
		while($members=mysql_fetch_array($members_query)){
		?>
        <tr>
          <td><input type="checkbox" class="aqj"></td>
          <td><a href="#">#<?=$members['member_id'];?></a></td>
          <td><?=$members['member_name']."  ".$members['member_surname'];?></td>
          <td><?=$members['member_username'];?></td>
          <td><?=$members['member_registered'];?></td>
          <td><?=$members['package_name'];?></td>
          <td>฿<?=number_format($members['package_price']*30);?></td>
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
  </div>

  <div id="docsModal" class="cb fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="rj">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Example modal</h4>
      </div>
      <div class="modal-body">
        <p>You're looking at an example modal in the dashboard theme.</p>
      </div>
      <div class="rk">
        <button type="button" class="ce fh" data-dismiss="modal">Cool, got it!</button>
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

