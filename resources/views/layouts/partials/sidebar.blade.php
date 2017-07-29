@inject('request', 'Illuminate\Http\Request')

<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p> -->
          <!-- Status -->
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> -->

      <!-- search form (Optional) -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">

        <li class="header">HEADER</li>

        <!-- Optionally, you can add icons to the links -->
        <li class="{{ $request->segment(1) == 'brands' ? 'active active-sub' : '' }}">
          <a href="{{action('BrandController@index')}}"><i class="fa fa-diamond"></i> <span>Brands</span></a>
        </li>

        <li class="{{ $request->segment(1) == 'tax-rates' ? 'active active-sub' : '' }}">
          <a href="{{action('TaxRateController@index')}}"><i class="fa fa-bolt"></i> <span>Tax Rates</span></a>
        </li>

        <li class="{{ $request->segment(1) == 'units' ? 'active active-sub' : '' }}">
          <a href="{{action('UnitController@index')}}"><i class="fa fa-balance-scale"></i> <span>Units</span></a>
        </li>

        <li class="treeview {{ $request->segment(1) == 'contacts' ? 'active active-sub' : '' }}">
          <a href="#"><i class="fa fa-users"></i> <span>Contacts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="{{action('ContactController@index', ['type' => 'supplier'])}}"><i class="fa fa-share"></i> Supplier</a></li>
            <li><a href="{{action('ContactController@index', ['type' => 'customer'])}}"><i class="fa fa-circle-o"></i> Customers</a></li>
          </ul>
        </li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>