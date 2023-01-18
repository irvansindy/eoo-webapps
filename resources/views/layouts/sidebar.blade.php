<aside class="main-sidebar sidebar-dark-info elevation-4" style="background-color: #9A0303;">

    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light" >OEE</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{URL::asset('profile.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-white">{{auth()->user()->name}}</a>
            </div>
        </div>


        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @php
                    $menus = DB::table('menus')
                        ->select('menus.*')
                      
                        ->get();
                 
                @endphp
                @foreach ($menus as $item)
                    @if($item->type == 1)
                    <li class="nav-item">
                        <a href="{{$item->link}}" class="nav-link">
                            <i class="nav-icon {{$item->icon}} icon_color_sidebar"></i>
                            <p>{{$item->menusName}}</p>
                        </a>
                    </li>
                    @else
                        <li class="nav-item">
                            @php
                                $submenus = DB::table('submenus')->select('submenus.*')
                                        ->where('submenus.menusId', $item->id)
                                        ->get();
                                // dd($submenus);
                            @endphp
                             <a href="#" class="nav-link">
                                <i class="nav-icon {{$item->icon}} icon_color_sidebar"></i>
                                <p>{{$item->menusName}}<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                            @foreach ($submenus as $row)
                                <li class="nav-item ml-2">
                                    <a href="{{$row->link}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                    <p>{{$row->submenusName}}</p>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>   
                    @endif
                @endforeach
                
             
            </ul>
        </nav>

    </div>

</aside>