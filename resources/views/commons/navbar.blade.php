<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">Tasklist</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    {{-- ログアウトへのリンク --}}
                    <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                    <div class="collapse navbar-collapse" id="nav-bar">
                    <ul class="navbar-nav mr-auto"></ul>
                    <ul class="navbar-nav">
                    
                    {{-- タスク作成ページへのリンク --}}
                            <li class="nav-item">{!! link_to_route('tasks.create', '新規タスクの投稿', [], ['class' => 'nav-link']) !!}</li>
                    </ul>
                            </div>
                    </ul>
                    </li>
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>
