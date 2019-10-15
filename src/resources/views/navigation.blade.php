<div class="classynav">
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('blog') }}">Categories</a>
            <ul class="dropdown">
                @foreach($categories as $category)
                <li><a href="{{route('category', $category->slug)}}">- {{$category->name}}</a></li>
                    @endforeach
            </ul>
        </li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contacts') }}">Contact</a></li>
        <?php if(!\Illuminate\Support\Facades\Auth::user()): ?>
        <li><a href="{{ route('login') }}">login</a></li>
        <?php endif ?>
        <?php if(\Illuminate\Support\Facades\Auth::user()): ?>
        <li><a href="{{ route('logout') }}">Logout</a></li>
        <?php endif ?>
        <?php if(!\Illuminate\Support\Facades\Auth::user()): ?>
        <li><a href="{{ route('registrate') }}">Registrate</a></li>
        <?php endif ?>
        <?php if(\Illuminate\Support\Facades\Auth::user()): ?>
        <?php echo 'Hi, ' . \Illuminate\Support\Facades\Auth::user()->name ?>
        <?php endif ?>
        
        
    </ul>

</div>
