<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('create_state') }}">
        <i class="bi bi-menu-button-wide"></i>
        <span>Create New State</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('create_indicator') }}">
        <i class="bi bi-journal-text"></i>
        <span>Create New Indicator</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('deliverable_approve') }}">
        <i class="bi bi-layout-text-window-reverse"></i>
        <span>Pending Requests</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin_event') }}">
        <i class="bi bi-menu-button-wide"></i>
        <span>Events</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin_stakeholderEngagementTracker') }}">
        <i class="bi bi-people fs-4 "></i>
        <span>Stake Holder Engagement Tracker</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('profile',[Auth::user()->id])}}">
        <i class="bi bi-person"></i>
        <span>Profile settings</span>
      </a>
    </li>
    <hr>
    <li class="nav-item">
      <form action="{{ route('logout') }}" method="post">
        @csrf
        <div class="nav-link collapsed">
          <button type="submit" class="btn ">
            <i class="bi bi-box-arrow-right"></i>
            Sign Out
          </button>
        </div>
      </form>

    </li>
    <!-- End Dashboard Nav -->

  </ul>

</aside>