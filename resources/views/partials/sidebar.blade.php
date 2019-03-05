  <!-- Sidebar -->
  <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
    <li class="nav-item">
        @role('admin')
                                <a class="nav-link " href="{{ route('roles.index') }}"  >
                                   <span   > Roles </span>
                                </a>
                                <a class="nav-link " href="{{ route('users.index' )}}" >
                                     <span  > Users</span>
                                </a>
                            @endrole
                                <a class="nav-link" href="/Post"  >
                                     <span   >Post</span>
                                </a>
                                <a  class="nav-link" href="/comment">
                                     <span  >ToComment </span>
                                </a>
                                <a  class="nav-link" href="/home"  >
                                    <span    > Home</span>
                                </a>
      </li>
    </ul>