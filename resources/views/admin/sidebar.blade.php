<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('/dashboard')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="category">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/category')}}">Add Category</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/all-category')}}">All Category</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#size" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-format-size menu-icon"></i>
          <span class="menu-title">Size</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="size">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/size')}}">Add Size</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/all-size')}}">All Size</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#color" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-airballoon menu-icon"></i>
            <span class="menu-title">Color</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="color">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/color')}}">Add Color</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/all-color')}}">All Color</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-airballoon menu-icon"></i>
          <span class="menu-title">Products</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="products">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/product')}}">Add Products</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/all-product')}}">All Products</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#orders" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-shopping menu-icon"></i>
          <span class="menu-title">Orders</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="orders">
          <ul class="nav flex-column sub-menu">

            <li class="nav-item"> <a class="nav-link" href="{{url('/orders')}}">All order</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#subscriber" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Subscriber</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="subscriber">
          <ul class="nav flex-column sub-menu">

            <li class="nav-item"> <a class="nav-link" href="{{url('/subscribe')}}">All Subscriber</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#hotdeal" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Hot Deal</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="hotdeal">
          <ul class="nav flex-column sub-menu">

            <li class="nav-item"> <a class="nav-link" href="{{url('/all-hot_deal')}}">View Hot Deal Banner</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/hot_deal')}}">Create HotDeal Banner</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#page" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Page</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="page">
          <ul class="nav flex-column sub-menu">

            <li class="nav-item"> <a class="nav-link" href="{{url('/all-page')}}">View Pages</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/create-page')}}">Create Pages</a></li>
          </ul>
        </div>
      </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#setting" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Website Setting</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="setting">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('/all-setting')}}">All Setting</a></li>
                </ul>
            </div>
        </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#user" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">Users</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="user">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href=""> Login </a></li>

          </ul>
        </div>
      </li>
    </ul>
  </nav>
