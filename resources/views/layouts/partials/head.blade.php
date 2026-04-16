<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'Sainte Chantal')</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<!-- Styles personnalisés -->
<style>
    .sidebar {
        background-color: #ffffff;
        min-height: 100vh;
    }

    .sidebar .nav-link {
        color: black;
        border-radius: 8px;
        margin-bottom: 5px;
        transition: 0.2s;
        display: flex;
        align-items: center;
    }

    .sidebar .nav-link:hover {
        background-color: #deb887;
    }

    .sidebar .nav-link.active {
        background-color: #973131 !important;
        color: white !important;
        font-weight: 600;
    }

    #dropdownUser:hover i {
        color: #973131;
        transition: 0.2s;
    }
</style>

@yield('extra-styles')