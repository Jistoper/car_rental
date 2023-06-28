<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('car.getall') }}">
          <i class="bi bi-layout-text-window-reverse"></i><span>Cars</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#rent-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cart2"></i><span>Rental</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="rent-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a class="nav-link collapsed" href="{{ route('car.getListCar') }}">
              <i class="bi bi-plus-circle-dotted"></i><span>Rent Car</span>
            </a>
          </li>
          <li>
            <a class="nav-link collapsed" href="#">
              <i class="bi bi-collection"></i><span>History</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#maintenance-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-screwdriver"></i><span>Maintenance</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="maintenance-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a class="nav-link collapsed" href="{{ route('car.getCarMtn') }}">
              <i class="bi bi-plus-circle-dotted"></i><span>Registry</span>
            </a>
          </li>
          <li>
            <a class="nav-link collapsed" href="{{ route('car.getListMtn') }}">
              <i class="bi bi-collection"></i><span>History</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>

  </aside><!-- End Sidebar-->