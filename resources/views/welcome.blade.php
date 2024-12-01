<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'ReligiousApp') }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
     
   

</head>
<body class="bg-fixed bg-cover bg-center from-green-400 to-blue-500">
<style>
        body {
            background-image: url('/images/isl5.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding-top: 64px;
        }

        /* Sticky navigation bar */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 999; /* Ensure the navigation bar appears above other content */
        }

        
        #about {
            background-color: #FDE68A; /* Light yellow */
            color: #6D2E46; /* Dark yellow */
            padding: 80px 0;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        /* Services section styles */
        #services {
            background-color: #B2F5EA; /* Light blue */
            color: #234E52; /* Dark blue */
            padding: 80px 0;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        /* Contact section styles */
        #contact {
            background-color: #FECACA; /* Light red */
            color: #6B2737; /* Dark red */
            padding: 80px 0;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

    </style>

    <nav class="bg-gray-900 shadow-md">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div>
                    <a href="#" class="text-lg font-semibold text-white">{{ config('app.name', 'ReligiousApp') }}</a>
                </div>
                <div class="hidden md:flex">
                    <a href="#about" class="text-white mx-4 hover:text-gray-300">About</a>
                    <a href="#services" class="text-white mx-4 hover:text-gray-300">Services</a>
                    <a href="#contact" class="text-white mx-4 hover:text-gray-300">Contact</a>
                </div>
                <div class="hidden md:flex items-center">
                    @if (Route::has('login'))
                        <div class="ml-4">
                            @auth
                                <a href="{{ url('/home') }}" class="text-sm text-white underline">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-white underline">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-white underline">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="bg-container mx-auto flex justify-center items-center h-screen">
        <div class=" text-center text-white">
            <!-- bg-gray-900 hover:bg-gray-800 font-semibold px-10 py-3 rounded-full -->
            <h1 class="text-5xl font-bold mb-8">እንኳን ደህና መጡ {{ config('app.name', 'ReligiousApp') }}</h1>
            <p class="text-lg mb-4">
                ይህ የሃይማት ተቋማትን የሚያገኙበት ቦታ ሲሆን<br>
                ሁለቱንም እስላማዊ እና ክርስቲያን ማህበረሰቦችን የሚያቅፍ፣ መንፈሳዊ እድገትን<br>
                የሚያጎለብት እና ትርጉም ያለው ግንኙነትን የሚያመቻች የመስመር ላይ መድረክ ነው
            </p>
            <a href="#" class="bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-semibold px-6 py-3 rounded-full shadow-md transition duration-300 ease-in-out">Learn More</a>
        </div>
    </div>

    <div id="about" class="container mb-2 mx-auto flex justify-center items-center">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">About Us</h1>
            <p class="text-lg mb-8">We are a community dedicated to spreading love, peace, and compassion.</p>
            <p class="text-lg">Our mission is to foster understanding and unity among people of all backgrounds and beliefs.</p>
        </div>
    </div>

    <div id="services" class="container mb-2 mx-auto flex justify-center items-center">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">Our Services</h1>
            <ul class="text-lg mb-8">
                <li>Community Outreach Programs</li>
                <li>Spiritual Guidance Sessions</li>
                <li>Interfaith Dialogues</li>
                <li>Education and Training</li>
            </ul>
            <p class="text-lg">We strive to serve our community with compassion and humility.</p>
        </div>
    </div>

    <div id="contact" class="container mb-2 mx-auto flex justify-center items-center">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">Contact Us</h1>
            <p class="text-lg mb-8">Have questions or want to get involved?</p>
            <p class="text-lg">Reach out to us at contact@example.com or call us at +1234567890.</p>
        </div>
    </div>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>

</body>
</html>
