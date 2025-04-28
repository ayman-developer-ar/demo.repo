<form action="{{ route('category.store') }}" method="POST">

    @csrf
    <div>
        <label>
            Category Name: <input type="text" name="name" required>
        </label>
    </div>
    <br>
    <div>
        <label>
            Category Type: <input type="text" name="type" required>
        </label>
    </div>
    <br>
    <div>
        <label>
            Category Price: <input type="number" name="price" required>
        </label>
    </div>
    <br>
    <button type="submit">
        create
    </button>
    
</form>