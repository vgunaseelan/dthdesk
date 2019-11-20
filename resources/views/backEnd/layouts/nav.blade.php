<!--sidebar-menu-->
<div id="sidebar"><a href="{{url('/admin')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li{{$menu_active==1? ' class=active':''}}><a href="{{url('/admin')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="submenu {{$menu_active==2? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span></a>
            <ul>
                <li><a href="{{url('/admin/category/create')}}">Add New Category</a></li>
                <li><a href="{{route('category.index')}}">List Categories</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==3? ' active':''}}"> <a h
        ref="#"><i class="icon icon-th-list"></i> <span>Products</span></a>
            <ul>
                <li><a href="{{url('/admin/product/create')}}">Add New Products</a></li>
                <li><a href="{{route('product.index')}}">List Products</a></li>
            </ul>
        </li>

        <li class="submenu {{$menu_active==4? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Coupons</span></a>
            <ul>
                <li><a href="{{route('coupon.create')}}">Add New Coupon</a></li>
                <li><a href="{{route('coupon.index')}}">List Coupons</a></li>
            </ul>
        </li>
        <hr>
        
       

        <li class="submenu {{$menu_active==5? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Main Packages</span></a>
            <ul>
                <li><a href="{{url('/admin/packages/create')}}">Add Main Packages</a></li>
                <li><a href="{{route('packages.index')}}">List Main packages</a></li>
            </ul>
        </li>

        <li class="submenu {{$menu_active==6? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Sub Packages</span></a>
            <ul>
                <li><a href="{{url('/admin/subpackages/create')}}">Add Sub Packages</a></li>
                <li><a href="{{route('subpackages.index')}}">List sub packages</a></li>
            </ul>
        </li>

        <li class="submenu {{$menu_active==11? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Channel Languages Type</span></a>
            <ul>
                <li><a href="{{url('/admin/languageType/create')}}">Add language Type</a></li>
                <li><a href="{{route('languageType.index')}}">List language Type</a></li>
            </ul>
        </li>

        <li class="submenu {{$menu_active==7? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Channels</span></a>
            <ul>
                <li><a href="{{route('channels.create')}}">Add Package Channels </a></li>
                <li><a href="{{route('channels.index')}}">List Package Channels </a></li>
            </ul>
        </li>

        <hr>
        <li class="submenu {{$menu_active==8? ' active':''}}"> <a href="#"><i class="icon icon-shopping-cart"></i> <span>Customers Shopping</span></a>
            <ul>
                <li><a href="{{route('customers.index')}}">Customers Orders</a></li>
                <!-- <li><a href="{{route('customers.create')}}">Packages List Customers</a></li> -->
            </ul>
        </li><hr>
        <li class="submenu {{$menu_active==9? ' active':''}}"> <a href="#"><i class="icon icon-envelope"></i> <span>Customers Enquiery</span></a>
            <ul>
                <li><a href="{{route('customers.create')}}">Enquiery</a></li>               
            </ul>
        </li>
        <li class="submenu {{$menu_active==10? ' active':''}}"> <a href="#"><i class="icon icon-tags"></i> <span>Customers Subscrib</span></a>
            <ul>
                <li><a href="{{ action('BackendCustomerController@subscrib') }}">Enquiery</a></li>
            </ul>
        </li>

        

    </ul>
</div>
<!--sidebar-menu-->