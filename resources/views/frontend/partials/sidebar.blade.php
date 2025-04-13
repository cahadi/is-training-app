<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="/dashboard"><img src="{{asset('assets/images/logo.svg')}}" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="/dashboard"><img src="{{asset('assets/images/logo-mini.svg')}}" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item nav-category">
            <span class="nav-link">Навигация</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="/dashboard">
                <span class="menu-icon">
                  <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Главная страница</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="/grades">
        <span class="menu-icon">
          <i class="mdi mdi-table-large"></i>
        </span>
                <span class="menu-title">Оценки</span>
            </a>
        </li>

        @foreach($subjects as $subject)
            <li class="nav-item nav-category">
                <span class="nav-link">{{ $subject->title }}</span>
            </li>
            @foreach($subject->topics as $topic)
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic{{ $topic->id }}" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                  <i class="mdi mdi-laptop"></i>
                </span>
                        <span class="menu-title">{{ $topic->title }}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic{{ $topic->id }}">
                        <ul class="nav flex-column sub-menu">
                            @foreach($topic->lessons as $lesson)
                                <li class="nav-item"> <a class="nav-link" href="/lesson/{{ $lesson->title }}">{{ $lesson->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endforeach
        @endforeach
    </ul>
</nav>
