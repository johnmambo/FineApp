<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 5 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>Timetablers</title>

	<link rel="shortcut icon" href="img/favicon.ico">

	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

	<!-- Choose your prefered color scheme -->
	<!-- <link href="css/light.css" rel="stylesheet"> -->
    {{-- <link rel="stylesheet" href="{{ asset('css/dark.css') }}"> --}}

    <link class="js-stylesheet" rel="stylesheet" href="{{ asset('css/light.css') }}">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q3ZYEKLQ68"></script>

    @livewireStyles


</head>


<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div id="mysidebar" class="sidebar-content js-simplebar ">
				<a class='sidebar-brand' href='#'>
					<span class="align-middle me-3">Tum</span>
				</a>

				<ul class="sidebar-nav">
                    @role('admin')
					<li class="sidebar-item active">
						<a data-bs-target="#dashboards" data-bs-toggle="collapse" class="sidebar-link">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Admin</span>
						</a>
						<ul id="dashboards" class="sidebar-dropdown list-unstyled collapse show"
							data-bs-parent="#sidebar">

                            <li class="sidebar-item">
								<a class='sidebar-link' href="{{ route('admin.showDepartments') }}"><i class="align-middle" data-feather="list"></i> <span
										class="align-middle">Departments</span>
								</a>
							</li>
							<li class="sidebar-item">
								<a class='sidebar-link' href="{{ route('admin.showCourses') }}"><i class="align-middle" data-feather="list"></i> <span
										class="align-middle">Courses</span>
								</a>
							</li>

							<li class="sidebar-item">
								<a class='sidebar-link' href="{{ route('admin.showUnits') }}"><i class="align-middle" data-feather="hash"></i> <span
										class="align-middle">Units</span>

								</a>
							</li>

							<li class="sidebar-item">
								<a class='sidebar-link' href="{{ route('admin.showLecturers') }}">
									<i class="align-middle" data-feather="users"></i> <span
										class="align-middle">Lecs</span>
								</a>
							</li>
							<li class="sidebar-item"><a class='sidebar-link' href='#'>
									<i class="align-middle" data-feather="users"></i> <span
										class="align-middle">Students</span>
								</a>
							</li>

							<li class="sidebar-item">
								<a class='sidebar-link' href='#'>
									<i class="align-middle" data-feather="settings"></i> <span
										class="align-middle">Roles</span>
								</a>
							</li>

						</ul>
					</li>
                    @endrole
                    @role('tabler')
					<li class="sidebar-item">
						<a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="layout"></i> <span class="align-middle">Tabler</span>
						</a>
						<ul id="pages" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class='sidebar-link' href="{{ route('tabler.showClassrooms') }}">Classrooms</a></li>
							<li class="sidebar-item"><a class='sidebar-link' href="{{ route('tabler.showDays') }}">Days</a>
                            <li class="sidebar-item"><a class='sidebar-link' href="{{ route('tabler.showTimeslots') }}">Timeslots</a>
                            <li class="sidebar-item"><a class='sidebar-link' href="{{ route('tabler.showTimetables') }}">Timetables</a>

							</li>
						</ul>
					</li>
                    @endrole('tabler')
				</ul>


			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg bg-success">
				<a class="sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">

						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
								data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
								data-bs-toggle="dropdown">
								 <span class="text-dark"> {{ Auth::user()->name }}</span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class='dropdown-item'  href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"><i class="align-inline me-1"
                                data-feather="log-out"></i>
                                 {{ __('Logout') }}</a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
								<a class="dropdown-item" href="#"><i class="align-middle me-1"
										data-feather="pie-chart"></i> Analytics</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
            <main class="content">
                <div class="container-fluid p-0">
                    <div class="row">
						<div class="col-12 col-xl-12">

                                @yield('content')

                        </div>
                    </div>
                </div>
            </main>


		</div>
	</div>


    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script>
        @if(session('success'))
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
    </script>

<script>
    @if(session('warning'))
        Swal.fire({
            title: 'Warning!',
            text: '{{ session('warning') }}',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
    @endif
</script>

<script>
    @if(session('error'))
        Swal.fire({
            title: 'error!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    @endif
</script>
    @livewireScripts
</body>

</html>
