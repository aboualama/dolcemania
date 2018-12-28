<div class="content-side content-side-full">
    <ul class="nav-main">
        <li class="nav-main-item">
            <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="/">
                <i class="nav-main-link-icon si si-cursor"></i>
                <span class="nav-main-link-name">Dashboard</span>
                <span class="nav-main-link-badge badge badge-pill badge-success">5</span>
            </a>
        </li>
        <li class="nav-main-heading">Anagrafiche</li>
        <li class="nav-main-item{{ request()->is('product/*') ? ' open' : '' }}">
            <a class="nav-main-link nav-main-link {{ request()->is('client') ? ' active' : '' }}" aria-haspopup="true" aria-expanded="false"
               href="{{route('client.index')}}">
                <i class="nav-main-link-icon si si-user"></i>
                <span class="nav-main-link-name">Clienti</span>
            </a>

            <a class="nav-main-link nav-main-link {{ request()->is('supplier') ? ' active' : '' }}" aria-haspopup="true" aria-expanded="false"
               href="{{route('supplier.index')}}">
                <i class="nav-main-link-icon si si-user"></i>
                <span class="nav-main-link-name">Fornitori</span>
            </a>

        </li>

        <li class="nav-main-item">
            <a class="nav-main-link nav-main-link {{ request()->is('price') ? ' active' : '' }}" aria-haspopup="true" aria-expanded="false"
               href="{{route('price.index')}}">
                <i class="nav-main-link-icon si si-docs"></i>
                <span class="nav-main-link-name">Listino</span>
            </a>

        </li>

      {{--  <li class="nav-main-item">
            <a class="nav-main-link nav-main-link" aria-haspopup="true" aria-expanded="false"
               href="{{route('setting.index')}}">
                <i class="nav-main-link-icon si si-docs"></i>
                <span class="nav-main-link-name">Setting</span>
            </a>

        </li>--}}


      {{--  <li class="nav-main-item">
            <a class="nav-main-link nav-main-link" aria-haspopup="true" aria-expanded="false"
               href="{{route('order.index')}}">
                <i class="nav-main-link-icon si si-docs"></i>
                <span class="nav-main-link-name">Order</span>
            </a>

        </li>--}}


        <li class="nav-main-item">
            <a class="nav-main-link nav-main-link {{ request()->is('eventcalendar') ? ' active' : '' }}" aria-haspopup="true" aria-expanded="false"
               href="{{url('/eventcalendar')}}">
                <i class="nav-main-link-icon si si-docs"></i>
                <span class="nav-main-link-name">Da confermare</span>
            </a>



        <li class="nav-main-item">
            <a class="nav-main-link nav-main-link {{ request()->is('getddt') ? ' active' : '' }}" aria-haspopup="true" aria-expanded="false"
               href="{{url('/getddt')}}">
                <i class="nav-main-link-icon si si-docs"></i>
                <span class="nav-main-link-name">DDT Calendar</span>
            </a>

        </li>


        <li class="nav-main-item">
            <a class="nav-main-link nav-main-link {{ request()->is('getproduction') ? ' active' : '' }}" aria-haspopup="true" aria-expanded="false"
               href="{{url('/getproduction')}}">
                <i class="nav-main-link-icon si si-docs"></i>
                <span class="nav-main-link-name">Production Calendar</span>
            </a>

        </li>
        </li>


        <li class="nav-main-heading">Gestione</li>
        <li class="nav-main-item">
            <a class="nav-main-link nav-main-link {{ request()->is('category') ? ' active' : '' }}" aria-haspopup="true" aria-expanded="false"
               href="{{route('category.index')}}">
                <i class="nav-main-link-icon si si-docs"></i>
                <span class="nav-main-link-name">Categorie</span>
            </a>

        </li>
        <li class="nav-main-item">
            <a class="nav-main-link nav-main-link {{ request()->is('product') ? ' active' : '' }}" aria-haspopup="true" aria-expanded="false"
               href="{{route('product.index')}}">
                <i class="nav-main-link-icon si si-docs"></i>
                <span class="nav-main-link-name">Prodotti</span>
            </a>

        </li>
        <li class="nav-main-item">
            <a class="nav-main-link nav-main-link {{ request()->is('order') ? ' active' : '' }}" aria-haspopup="true" aria-expanded="false"
               href="{{route('order.index')}}">
                <i class="nav-main-link-icon fas fa-box"></i>
                <span class="nav-main-link-name">Ordini</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link nav-main-link {{ request()->is('recurrentOrder') ? ' active' : '' }}" aria-haspopup="true" aria-expanded="false"
               href="/recurrentOrder">
                <i class="nav-main-link-icon fas fa-box"></i>
                <span class="nav-main-link-name">Ordini Ricorrenti</span>
            </a>
        </li>

        <li class="nav-main-item">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
               aria-expanded="false" href="#">
                <i class="nav-main-link-icon fas fa-industry"></i>
                <span class="nav-main-link-name">Produzione</span>
            </a>
        </li>


        <li class="nav-main-heading">Amministrazione</li>
        <li class="nav-main-item">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
               aria-expanded="false" href="#">
                <i class="nav-main-link-icon si si-doc"></i>
                <span class="nav-main-link-name">Fatture</span>
            </a>
            <ul class="nav-main-submenu">
                <li class="nav-main-item">
                    <a class="nav-main-link" href="">
                        <i class="nav-main-link-icon si si-plus"></i>
                        <span class="nav-main-link-name">Nuova</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="">
                        <i class="nav-main-link-icon si si-hourglass"></i>
                        <span class="nav-main-link-name">Attive</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="">
                        <i class="nav-main-link-icon si si-pencil"></i>
                        <span class="nav-main-link-name">Passive</span>
                    </a>
                </li>

            </ul>
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
               aria-expanded="false" href="#">
                <i class="nav-main-link-icon si si-doc"></i>
                <span class="nav-main-link-name">Note di credito</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
               aria-expanded="false" href="#">
                <i class="nav-main-link-icon si si-check"></i>
                <span class="nav-main-link-name">D.D.T.</span>
            </a>

        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="">
                <i class="nav-main-link-icon si si-moustache"></i>
                <span class="nav-main-link-name">Scadinziario</span>
                <span class="nav-main-link-badge badge badge-pill badge-primary">4</span>
            </a>
        </li>

        <li class="nav-main-heading">Reportistica</li>

    </ul>
</div>
