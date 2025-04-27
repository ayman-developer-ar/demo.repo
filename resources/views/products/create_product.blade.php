<form action="{{ route('products.store') }}" method="POST">

    @csrf
    <div>
        <label>
            Product Name: <input type="text" name="name" required>
        </label>
    </div>
    <br>
    <div>
        <label>
            Product Price: <input type="text" name="price" required>
        </label>
    </div>
    <br>
    <button type="submit">
        create
    </button>
    
</form>