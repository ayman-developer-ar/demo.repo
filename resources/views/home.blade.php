@if (strlen(string: $myname) > 5)

    <p>Hello Ayman</p>

    @else

        <p>Hi {{ $myname }} your age is {{ $age }}</p>

@endif

@unless(strlen(string: $myname) == 5)  

    <h1>your name is long</h1>

@endunless


