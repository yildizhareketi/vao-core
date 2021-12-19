<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
         data-menu-dropdown-timeout="500">
        <ul class="menu-nav">


            @if(\Illuminate\Support\Facades\Config::has('menu'))

                @foreach(\Illuminate\Support\Facades\Config::get('menu') as $item)

                    @if(isset($item['section']) && $item['section'] != null )
                        <li class="menu-section">
                            <h4 class="menu-text">{{ $item['section'] }}</h4>
                            <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                        </li>
                    @endif

                    <li class="menu-item {{ isset($item['children']) && $item['children'] ? 'menu-item-submenu':null }}"
                        aria-haspopup="true" {{ isset($item['children']) && $item['children'] ? 'data-menu-toggle="hover" ':null }}>
                        <a href="{{ isset($item['children']) && $item['children'] ? 'javascript:;':$item['link'] }}"
                           class="menu-link {{ isset($item['children']) && $item['children'] ? 'menu-toggle':null }}">
                            <i class="menu-icon flaticon-home"></i>
                            <span class="menu-text">{{ $item['text'] }}</span>

                            @if(isset($item['children']) && $item['children'])
                                <i class="menu-arrow"></i>
                            @endif

                        </a>


                        @if(isset($item['children']) && $item['children'])

                            <div class="menu-submenu">
                                <i class="menu-arrow"></i>
                                <ul class="menu-subnav">

                                    @foreach($item['children'] as $childItem)
                                    <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                        data-menu-toggle="hover">
                                        <a href="{{ $childItem['link'] }}" class="menu-link ">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">{{ $childItem['text'] }}</span>
                                        </a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        @endif
                    </li>


                @endforeach



            @else
                <x-vao-core-alert message="Menu Not Configured"/>
            @endif
        </ul>
    </div>
</div>
