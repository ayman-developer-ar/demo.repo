@foreach ($car_Types as $car_Type)

    <p>{{ $car_Type }}</p>

@endforeach

@forelse ($number_to_ten as $number)

    <p>{{ $number }}</p>

    @empty
        <p>No numbers found</p>
@endforelse

@while ($x < 10)
    <p>{{ $x }}</p>
    @php
        $x+=2;
    @endphp
@endwhile


