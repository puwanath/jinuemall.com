<nav class="ch">
    <a class="aou" href="/system" style="padding:12px;">
      <img src="http://jinuemall.com/system/@pages/images/jSystem-icon.png" style="max-width:100%;">
    </a>
    <div class="aoy">
      <ul class="nav og aow">
        <li class="<?if($page==''){ echo "active"; }?> ">
          <a href="<?=$url;?>?page=" title="Overview" data-toggle="tooltip" data-placement="right" data-container="body">
            <span class="bv abv"></span>
            <small class="aox sb">Overview</small>
          </a>
        </li>
        <li  class="<?if($page=='members'){ echo "active"; }?> ">
          <a href="<?=$url;?>?page=members" title="Members" data-toggle="tooltip" data-placement="right" data-container="body">
            <span class="bv ajh"></span>
            <small class="aox sb">Members</small>
          </a>
        </li>
        <li  class="<?if($page=='products'){ echo "active"; }?> ">
          <a href="<?=$url;?>?page=products" title="Products" data-toggle="tooltip" data-placement="right" data-container="body">
            <span class="bv acs"></span>
            <small class="aox sb">Products</small>
          </a>
        </li>
        <li  class="<?if($page=='orders'){ echo "active"; }?> ">
          <a href="<?=$url;?>?page=orders" title="Orders" data-toggle="tooltip" data-placement="right" data-container="body">
            <span class="bv agw"></span>
            <small class="aox sb">Orders</small>
          </a>
        </li>
        <li class="<?if($page=='withdraw'){ echo "active"; }?>">
          <a href="<?=$url;?>?page=withdraw" title="Icon-nav layout" data-toggle="tooltip" data-placement="right" data-container="body">
            <span class="bv vc"></span>
            <small class="aox sb">Withdraw</small>
          </a>
        </li>
        <li >
          <a href="<?=$url;?>?page=docs" title="Docs" data-toggle="tooltip" data-placement="right" data-container="body">
            <span class="bv add"></span>
            <small class="aox sb">Docs</small>
          </a>
        </li>
        <li >
          <a href="<?=$url;?>?page=light" title="Light UI" data-toggle="tooltip" data-placement="right" data-container="body">
            <span class="bv aaj"></span>
            <small class="aox sb">Light UI</small>
          </a>
        </li>
        <li>
          <a href="#" title="Signed in as mdo" data-toggle="tooltip" data-placement="right" data-container="body">
            <img src="<?=$dir;?>/dashboard/img/avatar-mdo.png" alt="" class="cs cn">
            <small class="aox sb">@mdo</small>
          </a>
        </li>
      </ul>
    </div>
 </nav>