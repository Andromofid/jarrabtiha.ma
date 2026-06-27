<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>
    <style>
        :root {
            --bg: #f5f7fb;
            --surface: #ffffff;
            --text: #162033;
            --muted: #6b7280;
            --line: #d7deea;
            --accent: #0f766e;
            --accent-dark: #115e59;
            --danger: #b91c1c;
        }

        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(180deg, #eef4ff 0%, var(--bg) 220px);
            color: var(--text);
        }
        a { color: inherit; text-decoration: none; }
        .container {
            width: min(1100px, calc(100% - 32px));
            margin: 0 auto;
            padding: 32px 0 48px;
        }
        .topbar {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            align-items: center;
            margin-bottom: 24px;
        }
        .title h1 {
            margin: 0;
            font-size: 2rem;
        }
        .title p {
            margin: 6px 0 0;
            color: var(--muted);
        }
        .nav {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .nav a,
        .button,
        button {
            border: 1px solid var(--line);
            background: var(--surface);
            color: var(--text);
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 0.95rem;
            cursor: pointer;
        }
        .nav a.active,
        .button.primary,
        button.primary {
            background: var(--accent);
            border-color: var(--accent);
            color: #fff;
        }
        .button.danger,
        button.danger {
            color: #fff;
            background: var(--danger);
            border-color: var(--danger);
        }
        .card {
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 16px 40px rgba(15, 23, 42, 0.06);
        }
        .flash {
            margin-bottom: 18px;
            padding: 12px 14px;
            border-radius: 12px;
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
        }
        .errors {
            margin-bottom: 18px;
            padding: 12px 14px;
            border-radius: 12px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }
        .header-row {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            align-items: center;
            margin-bottom: 18px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            text-align: left;
            padding: 14px 12px;
            border-bottom: 1px solid var(--line);
            vertical-align: top;
        }
        th { color: var(--muted); font-weight: 600; }
        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }
        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .field.full { grid-column: 1 / -1; }
        label {
            font-weight: 600;
        }
        input, select, textarea {
            width: 100%;
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 12px 14px;
            font: inherit;
            background: #fff;
        }
        textarea {
            min-height: 140px;
            resize: vertical;
        }
        .checkbox {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .checkbox input {
            width: auto;
        }
        .muted { color: var(--muted); }
        .empty {
            padding: 24px;
            text-align: center;
            color: var(--muted);
            border: 1px dashed var(--line);
            border-radius: 14px;
        }
        @media (max-width: 720px) {
            .topbar, .header-row { flex-direction: column; align-items: stretch; }
            .grid { grid-template-columns: 1fr; }
            table, thead, tbody, th, td, tr { display: block; }
            thead { display: none; }
            td {
                border-bottom: 0;
                padding: 10px 0;
            }
            tr {
                padding: 14px 0;
                border-bottom: 1px solid var(--line);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="topbar">
            <div class="title">
                <h1>Admin Panel</h1>
                <p>Manage products and categories without authentication.</p>
            </div>

            <nav class="nav">
                <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">Products</a>
                <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">Categories</a>
            </nav>
        </div>

        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="errors">
                <strong>Please fix the following errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            @yield('content')
        </div>
    </div>
</body>
</html>
