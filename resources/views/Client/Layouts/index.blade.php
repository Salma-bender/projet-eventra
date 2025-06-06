<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Eventra - Event Conference HTML Templates</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="client/images/favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('client/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <!--Custom CSS-->
    <link href="{{ asset('client/css/style.css') }}" rel="stylesheet" type="text/css">
    <!--Plugin CSS-->
    <link href="{{ asset('client/css/plugin.css') }}" rel="stylesheet" type="text/css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('client/fonts/line-icons.css') }}" type="text/css">
    <script src="{{ asset('vendor/kustomer/js/kustomer.js') }}" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            var validationErrors = $('#validation-errors').html();

            if (validationErrors.trim() !== '') {
                $('#exampleModal').modal('show');
            }
        });
    </script>
  @if(session('Demandeur'))
    <script>
        $(document).ready(function() {
            $('#successModal').modal('show');
        });
    </script>
@endif

</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status"></div>
    </div>
    <!-- Preloader Ends -->

    <!-- header starts -->
    <header class="main_header_area">
        <!-- Navigation Bar -->
        <div class="header_menu" id="header_menu">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-flex d-flex align-items-center justify-content-between w-100 pb-2 pt-2">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a class="navbar-brand" href="{{route('home')}}">
                                <img src="{{ asset('client/images/monlogo1.png') }}" alt="image">
                                <img src="{{ asset('client/images/monlogo.png') }}" alt="image">
                            </a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="navbar-collapse1  align-items-center" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav" id="responsive-menu">
                                <li class="dropdown submenu active">
                                    <a href="{{route('home')}}" class="">Home</a>
                                </li>

                                <li><a href="{{ url('about' )}}" class="">À PROPOS </a></li>

                                <li class="submenu dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <i class="fas fa-caret-down ms-1" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        @foreach($categories as $category)
                                        <li><a href="{{route('ShowEventByCategory', $category->id)}}">{{$category->Nom}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @guest
                                @else
                                <li><a href="{{ url('historique' )}}" class="">Historique</a></li>
                                @endguest
                                <!-- resources/views/notifications.blade.php -->



                                <li><a href="{{ url('contact') }}" class="">Contactez</a></li>



                                @guest
    {{-- Liens pour les invités --}}
    @if (Route::has('login'))
        <li>
            <a href="{{ route('login') }}">Se connecter</a>
        </li>
    @endif

    @if (Route::has('register'))
        <li>
            <a href="{{ route('register') }}">Register</a>
        </li>
    @endif
@else
    {{-- Liens pour l’utilisateur connecté --}}
    <li class="submenu dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
           aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }} <i class="fas fa-caret-down ms-1"></i>
        </a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('profileclient') }}">Mon Compte</a></li>
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Se déconnecter
                </a>
            </li>
        </ul>
    </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    @if (Auth::user()->role == 'demandeur')
        {{-- Lien “Ajouter un événement” --}}
        <li>
            <a href="#" style="color: #f2f2f2;"
               data-bs-toggle="modal" data-bs-target="#exampleModal">
                Ajouter un événement
            </a>
        </li>

        {{-- Menu Notifications --}}
        <!--<li class="submenu dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
               id="notifications-button" aria-haspopup="true" aria-expanded="false">
                Notifications <span id="notification-count" data-count="0">0</span>
                <i class="fas fa-caret-down ms-1"></i>
            </a>
            <ul class="dropdown-menu" id="notifications-list">
                <div id="notifications">
                   Notifications will be added here dynamically 
                </div>
            </ul>
        </li>-->
    @endif
@endguest


                       




                        <li class="search-main">
                        <a href="#search1" class="mt_search"><i class="fa fa-search fs-5"></i></a>
                    </li>
                    </ul>
                    </div><!-- /.navbar-collapse -->
                    <div id="slicknav-mobile"></div> <!-- This div is required for slicknav to work -->

                    </div><!-- /.navbar-collapse -->
                  


        </div><!-- /.container-fluid -->
        </nav>

        </div>
        <!-- Navigation Bar Ends -->

    </header>

    <style>
        /* Style the modal background */
        .modal-content {
            background-color: #ffffff;
            border-radius: 10px;
        }

        /* Style the modal title */
        .modal-title {
            color: #333;
        }

        /* Style the modal body */
        .modal-body {
            font-size: 18px;
            color: #555;
        }

        /* Style the modal footer */
        .modal-footer {
            background-color: #f2f2f2;
            border-top: none;
        }

        /* Style the close button */
        .modal-content .close {
            font-size: 24px;
            color: #555;
        }

        /* Style the close button on hover */
        .modal-content .close:hover {
            color: #333;
        }
    </style>

    </style>
    <center> @if (session('Demandeur'))
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="text-center">
                            <i class="fas fa-check-circle fa-4x text-success mb-3"></i>
                            <p>Votre demande d'événement a été envoyée avec succès à l'administrateur. Veuillez patienter pour leur réponse.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>


        @endif
    </center>


    <!-- header ends -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un événement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Place your form here -->
                    <form method="post" action="{{ route('addEventByDemandeur') }}" name="eventForm" id="eventForm" class="row g-3" enctype="multipart/form-data" onsubmit="showSuccessModal(event)">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label">Nom</label>
                            <input type="text" name="Nom" class="form-control" placeholder="Enter Nom" value="{{ old('Nom') }}" required>
                            @if ($errors->has('Nom'))
                            <strong style="color: red;">{{ $errors->first('Nom') }}</strong>
                            @endif
                        </div>
                        <div id="validation-errors" style="display: none">
                        @if ($errors->has('Nom') || $errors->has('Location') || $errors->has('Nombre_total_abonnés') || $errors->has('Prix') || $errors->has('start_date') || $errors->has('end_date') || $errors->has('start_time') || $errors->has('end_time') || $errors->has('Description') || $errors->has('Image') || $errors->has('category_id'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <input type="hidden" name="status" value="En attente" class="form-control">
                        <div class="col-md-12">
    <label class="form-label">Location</label>
    <select name="Location" class="form-control" required>
        <option value="" disabled selected style="color: grey;">Select a Location</option>
        <option style="color:black" value="Casablanca" @if(old('Location')==='Casablanca') selected @endif>Casablanca</option>
        <option style="color:black" value="Rabat" @if(old('Location')==='Rabat') selected @endif>Rabat</option>
        <option style="color:black" value="Marrakech" @if(old('Location')==='Marrakech') selected @endif>Marrakech</option>
        <option style="color:black" value="Fès" @if(old('Location')==='Fès') selected @endif>Fès</option>
        <option style="color:black" value="Tanger" @if(old('Location')==='Tanger') selected @endif>Tanger</option>
        <option style="color:black" value="Agadir" @if(old('Location')==='Agadir') selected @endif>Agadir</option>
        <option style="color:black" value="Meknès" @if(old('Location')==='Meknès') selected @endif>Meknès</option>
        <option style="color:black" value="Oujda" @if(old('Location')==='Oujda') selected @endif>Oujda</option>
        <option style="color:black" value="Laâyoune" @if(old('Location')==='Laâyoune') selected @endif>Laâyoune</option>
        <option style="color:black" value="Errachidia" @if(old('Location')==='Errachidia') selected @endif>Errachidia</option>
        <option style="color:black" value="Beni Mellal" @if(old('Location')==='Beni Mellal') selected @endif>Beni Mellal</option>
        <option style="color:black" value="Tétouan" @if(old('Location')==='Tétouan') selected @endif>Tétouan</option>
        <option style="color:black" value="Khouribga" @if(old('Location')==='Khouribga') selected @endif>Khouribga</option>
        <option style="color:black" value="El Jadida" @if(old('Location')==='El Jadida') selected @endif>El Jadida</option>
        <option style="color:black" value="Safi" @if(old('Location')==='Safi') selected @endif>Safi</option>
        <option style="color:black" value="Taroudant" @if(old('Location')==='Taroudant') selected @endif>Taroudant</option>
        <option style="color:black" value="Nador" @if(old('Location')==='Nador') selected @endif>Nador</option>
        <option style="color:black" value="Ouarzazate" @if(old('Location')==='Ouarzazate') selected @endif>Ouarzazate</option>
        <option style="color:black" value="Kénitra" @if(old('Location')==='Kénitra') selected @endif>Kénitra</option>
        <option style="color:black" value="Essaouira" @if(old('Location')==='Essaouira') selected @endif>Essaouira</option>
        <option style="color:black" value="Guelmim" @if(old('Location')==='Guelmim') selected @endif>Guelmim</option>
        <option style="color:black" value="Taza" @if(old('Location')==='Taza') selected @endif>Taza</option>
        <option style="color:black" value="Al Hoceima" @if(old('Location')==='Al Hoceima') selected @endif>Al Hoceima</option>
        <option style="color:black" value="Settat" @if(old('Location')==='Settat') selected @endif>Settat</option>
    </select>
                            @if ($errors->has('Location'))
                            <strong style="color: red;">{{ $errors->first('Location') }}</strong>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Nombre_total_abonnés</label>
                            <input type="number" name="Nombre_total_abonnés" class="form-control" placeholder="Enter Nombre_total_abonnés" value="{{ old('Nombre_total_abonnés') }}" required>
                            @if ($errors->has('Nombre_total_abonnés'))
                            <strong style="color: red;">{{ $errors->first('Nombre_total_abonnés') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Prix</label>
                            <input type="number" name="Prix" class="form-control" placeholder="Enter Prix" value="{{ old('Prix') }}" required>
                            @if ($errors->has('Prix'))
                            <strong style="color: red;">{{ $errors->first('Prix') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Start Date</label>
                            <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
                            @if ($errors->has('start_date'))
                            <strong style="color: red;">{{ $errors->first('start_date') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">End Date</label>
                            <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}" required>
                            @if ($errors->has('end_date'))
                            <strong style="color: red;">{{ $errors->first('end_date') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Start Time</label>
                            <input type="time" name="start_time" class="form-control" value="{{ old('start_time') }}" required>
                            @if ($errors->has('start_time'))
                            <strong style="color: red;">{{ $errors->first('start_time') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">End Time</label>
                            <input type="time" name="end_time" class="form-control" value="{{ old('end_time') }}" required>
                            @if ($errors->has('end_time'))
                            <strong style="color: red;">{{ $errors->first('end_time') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea name="Description" class="form-control" placeholder="Enter Description" required>{{ old('Description') }}</textarea>
                            @if ($errors->has('Description'))
                            <strong style="color: red;">{{ $errors->first('Description') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Image</label>
                            <input type="file" name="Image" class="form-control" accept="image/*" required>
                            @if ($errors->has('Image'))
                            <strong style="color: red;">{{ $errors->first('Image') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" style="color:black;" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->Nom }}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                            <strong style="color: red;">{{ $errors->first('category_id') }}</strong>
                            @endif
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" href="{{ route('addEventByDemandeur') }}" form="eventForm" class="btn btn-primary" onclick="event.preventDefault();  document.getElementById('eventForm').submit();">Ajouter l'événement</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    @yield('content')

   <!-- footer starts -->
<footer class="pt-12 pb-7" style="background-image: url(images/pexels-sascha.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-5 pe-lg-4">
                <div class="footer-about">
                    <img src="images/logo-white.png" alt="">
                    <p class="mt-3 mb-3 white">
                        Eventra vous accompagne pour organiser vos événements les plus mémorables à Marrakech.
                    </p>
                    <div class="social-links">
                        <ul>
                            <li><a href="https://www.facebook.com/share/1BzQbvJBUe/?mibextid=wwXIfrigsh=MWJjYm9mcWd4NWtpMw%3D%3D&utm_source=qr" target="_blank"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/salmabender" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/salma-bender-1b3842321?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 mb-5">
                <div class="footer-links">
    <h4 class="white mb-4">Liens rapides</h4>
    <ul class="list">
        <li class="pb-2"><a href="{{ route('home') }}" class="white">Accueil</a></li>
        <li class="pb-2"><a href="{{ route('about') }}" class="white">À propos</a></li>
        <li><a href="{{ route('contact') }}" class="white">Contact</a></li>
    </ul>
</div>

            </div>

            <div class="col-lg-3 col-md-6 mb-5">
                <div class="footer-links">
                    <h4 class="white mb-4">Entrer en contact</h4>
                    <p class="mb-3">Faculté des Sciences Semlalia, Route Abdelkarim El Khatabi, Marrakech</p>
                    <div class="footer-contact d-flex align-items-center mb-3">
                        <i class="fa fa-phone white fs-4"></i>
                        <div class="footer-contact-content ps-3">
                            <h6 class="white mb-0">(+212) 627865006</h6>
                            <small class="white">Pour toute information</small>
                        </div>
                    </div>
                    <div class="footer-contact d-flex align-items-center">
                        <i class="fa fa-envelope white fs-4"></i>
                        <div class="footer-contact-content ps-3">
                            <h6 class="white mb-0">salmabender11@gmail.com</h6>
                            <small class="white">Adresse e-mail</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="theme-overlay opacity-90"></div>
</footer>

<div class="footer-copyright bg-theme1">
    <div class="container">
        <p class="m-0 white text-center py-3">Copyright ©2026 Eventra. Tous droits réservés.</p>
    </div>
</div>
<!-- footer ends -->


    <!-- Back to top start -->
    <div id="back-to-top">
        <a href="#"></a>
    </div>
    <!-- Back to top ends -->

    <!-- search popup -->
    <div id="search1">
        <button type="button" class="close">×</button>
        <form action="{{ url('search')}}" id="search">
            <input type="search" name="q" value="{{ request()->q ??''}}" placeholder="Recherchez par mot-clé…" required />
            <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                                                     document.getElementById('search').submit();">Search</button>
        </form>
    </div>


    <!-- *Scripts* -->


    <style>
        /* CSS styles for notification items */
        .notification-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f5f5f5;
        }

        /* CSS styles for notification messages */
        .notification-message {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
        }

        /* CSS styles for the "View Event Details" link */
        .view-event-link {
            color: #007bff;
            text-decoration: none;
            margin-top: 5px;
            display: block;
        }

        /* CSS styles for the "No notifications" message */
        .no-notifications {
            font-size: 18px;
            font-weight: bold;
            color: #888;
            text-align: center;
            margin: 20px 0;
        }
    </style>
    @guest



    @else
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the user ID (You need to set this based on your authentication logic)
            const userId = '{{ Auth::id() }}';

            // Function to add a notification to the list and local storage
            function addNotification(message) {
                // Create a new list item for the notification
                const notificationItem = document.createElement('li');
                notificationItem.className = 'notification-item';

                // Create the notification content element
                const notificationContent = document.createElement('div');
                notificationContent.innerHTML = message;

                // Add the notification content to the list item
                notificationItem.appendChild(notificationContent);

                // Add the new notification to the notifications list
                notificationsList.appendChild(notificationItem);
            }

            // Get notifications list and count elements
            const notificationsList = document.getElementById('notifications-list');
            const notificationCount = document.getElementById('notification-count');
            const noNotificationsMessage = document.createElement('li');
            noNotificationsMessage.textContent = 'No notifications';

            // Initialize the notification count from local storage
            let countValue = parseInt(localStorage.getItem(`notificationCount_${userId}`)) || 0;
            notificationCount.textContent = countValue;
            notificationCount.setAttribute('data-count', countValue);

            // Initialize the notifications list from local storage
            const storedNotifications = JSON.parse(localStorage.getItem(`notifications_${userId}`)) || [];

            // Load existing notifications from local storage
            if (storedNotifications.length === 0) {
                // If local storage is empty, hide the message

                noNotificationsMessage.style.display = 'none';


            } else {


                // determine if the "No notifications" message is in the list




                if (storedNotifications.length > 0) {
                    // remove the "No notifications" message



                    // If there are notifications, display them
                    storedNotifications.forEach((notification) => {
                        addNotification(notification);
                    });
                }

                // If there are notifications, display them

            }

            // Initialize Echo for the private channel
            const echo = window.Echo.private(`myPrivateChannel.user.${userId}`);

            // Listen for notifications
            echo.listen('.App\\Events\\PrivateChannelUser', (e) => {
                // Check if the notification already exists in local storage
                if (!storedNotifications.includes(e.message)) {
                    addNotification(e.message);

                    // Update the notification count
                    countValue++;
                    notificationCount.textContent = countValue;
                    notificationCount.setAttribute('data-count', countValue);

                    // Add the new notification to the local storage
                    storedNotifications.push(e.message);
                    localStorage.setItem(`notifications_${userId}`, JSON.stringify(storedNotifications));
                    localStorage.setItem(`notificationCount_${userId}`, countValue);

                    // Hide the "No notifications" message
                    noNotificationsMessage.style.display = 'none';
                }
            });

            // Add a click event listener to the notifications button
            const notificationsButton = document.getElementById('notifications-button');
            notificationsButton.addEventListener('click', () => {
                // Reset the notification count to 0
                countValue = 0;
                notificationCount.textContent = countValue;
                notificationCount.setAttribute('data-count', countValue);

                // Update the local storage count
                localStorage.setItem(`notificationCount_${userId}`, countValue);
            });
        });
    </script>

    <style>
        /* Style for the container of notification items */
        .notification-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        /* Style for each notification item */
        .notification-item {
            display: flex;
            align-items: center;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 10px;
        }

        /* Style for notification links */
        .notification-link {
            color: #007bff;
            text-decoration: none;
            margin-left: 10px;
        }

        /* Add a hover effect for better user experience */
        .notification-item:hover {
            background-color: #e0e0e0;
            transition: background-color 0.3s ease-in-out;
        }
    </style>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JavaScript -->

    <script src="{{asset('client/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('client/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('client/js/plugin.js')}}"></script>
    <script src="{{asset('client/js/main.js')}}"></script>
    <script src="{{asset('client/js/custom-nav.js')}}"></script>
    @endguest

    <script>
  // Quand tout est prêt (images, CSS, JS…), on masque le preloader
  $(window).on('load', function() {
    $('#preloader').fadeOut('slow');
  });
</script>
</body>


</html>