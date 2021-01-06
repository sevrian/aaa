<div class="main-sidebar">
   <aside id="sidebar-wrapper">
     <div class="sidebar-brand">
       <a href="index.html">RADIUS DASHBOARD</a>
     </div>
     <div class="sidebar-brand sidebar-brand-sm">
       <a href="index.html">St</a>
     </div>
     <ul class="sidebar-menu">
         <li class="menu-header">Dashboard</li>
         <li class="{{ Request::is('user')?'active':''}}"><a class="nav-link" href="{{ url ('user')}}"><i class="far fa-square"></i> <span>Admin</span></a></li>
         <li class="{{ Request::is('client')?'active':''}}"><a class="nav-link" href="{{ url ('client')}}"><i class="far fa-user"></i> <span>Client</span></a></li>
       </ul>

       {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
         <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
           <i class="fas fa-rocket"></i> Documentation
         </a>
       </div> --}}
   </aside>
 </div>