<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Listing | Palengke Hub</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --paper: #fcfbf7;
            --ink: #2d2926;
            --accent: #e67e22;
            --border: #dcd7ce;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #edece9;
            background-image: radial-gradient(#d3cfc8 1px, transparent 1px);
            background-size: 20px 20px;
            color: var(--ink);
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }

        .form-container {
            background: var(--paper);
            width: 100%;
            max-width: 500px;
            padding: 50px;
            border-radius: 4px;
            border: 2px solid var(--ink);
            box-shadow: 12px 12px 0px rgba(45, 41, 38, 0.1);
        }

        header { text-align: center; margin-bottom: 40px; border-bottom: 3px double var(--ink); padding-bottom: 20px; }
        h2 { font-size: 2.2rem; font-weight: 800; text-transform: uppercase; margin: 0; }
        p.tagline { font-style: italic; color: #666; margin-top: 5px; }

        .alert { padding: 15px; border: 2px solid var(--ink); margin-bottom: 25px; font-weight: 600; text-transform: uppercase; font-size: 0.8rem; }
        .alert-success { background: #d4edda; }
        .alert-error { background: #f8d7da; }

        .form-group { margin-bottom: 25px; }
        label { display: block; font-weight: 800; margin-bottom: 8px; font-size: 0.75rem; text-transform: uppercase; }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid var(--ink);
            font-family: inherit;
            background: #fff;
            box-sizing: border-box;
            font-weight: 600;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            background: #fffdf0;
            border-color: var(--accent);
        }

        .error-msg { color: #b91c1c; font-size: 0.7rem; font-weight: 700; margin-top: 4px; display: block; }

        button {
            width: 100%;
            background: var(--ink);
            color: white;
            border: none;
            padding: 20px;
            font-size: 1.1rem;
            font-weight: 800;
            text-transform: uppercase;
            cursor: pointer;
            border: 2px solid var(--ink);
            transition: 0.2s;
        }

        button:hover {
            background: var(--accent);
            transform: translate(-4px, -4px);
            box-shadow: 8px 8px 0px var(--ink);
        }

        textarea { min-height: 100px; resize: none; }
    </style>
</head>
<body>

<div class="form-container">
    <header>
        <h2>Palengke Listing</h2>
        <p class="tagline">Register your fresh harvest</p>
    </header>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error">Please fix the errors below.</div>
    @endif

    <form method="POST" action="/form">
        @csrf

        <div class="form-group">
            <label>Vendor Name</label>
            <input type="text" name="vendor_name" value="{{ old('vendor_name') }}" placeholder="Juan dela Cruz">
            @error('vendor_name') <span class="error-msg">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="vendor@example.com">
            @error('email') <span class="error-msg">{{ $message }}</span> @enderror
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 2fr 1fr; gap: 15px;">
            <div>
                <label>Product Name</label>
                <input type="text" name="product_name" value="{{ old('product_name') }}" placeholder="Baguio Beans">
                @error('product_name') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
            <div>
                <label>Price (₱)</label>
                <input type="number" name="price" value="{{ old('price') }}" placeholder="0.00">
                @error('price') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="category">
                <option value="">-- Choose Type --</option>
                <option value="vegetables" {{ old('category') == 'vegetables' ? 'selected' : '' }}>Vegetables</option>
                <option value="fruits" {{ old('category') == 'fruits' ? 'selected' : '' }}>Fruits</option>
                <option value="meat" {{ old('category') == 'meat' ? 'selected' : '' }}>Meat</option>
            </select>
            @error('category') <span class="error-msg">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" placeholder="Briefly describe your product...">{{ old('description') }}</textarea>
            @error('description') <span class="error-msg">{{ $message }}</span> @enderror
        </div>

        <button type="submit">List Product</button>
    </form>
</div>

</body>
</html>
