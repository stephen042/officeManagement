<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Indicators</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('event') }}">
          <i class="bi bi-house"></i>
          <span>Event</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('stakeholderEngagementTracker') }}">
          <i class="bi bi-people fs-4 "></i>
          <span class="text-wrap">Stake Holder Engagement Tracker</span>
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