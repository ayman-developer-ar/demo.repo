<h1>Car types List</h1>

@foreach ($car_Types as $car_Type)

    <p>{{ $car_Type }}</p>

@endforeach

@forelse ($number_to_ten as $number)

    <p>{{ $number }}</p>

    @empty
        <p>No numbers</p>
@endforelse

@while ($x < 10)
    <p>{{ $x }}</p>
    @php
        $x++;
    @endphp
@endwhile


