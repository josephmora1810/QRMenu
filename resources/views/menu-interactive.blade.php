<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Menú digital interactivo del restaurante">

    <title>{{ config('app.name', 'Interactive Menu') }}</title>

    <!-- Tailwind CSS v4 desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/08eae258ab.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Flex:opsz,wght,XOPQ,XTRA,YOPQ,YTDE,YTFI,YTLC,YTUC@8..144,100..1000,96,468,79,-203,738,514,712&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-50 text-gray-800 font-sans">
    <!-- Header/Navbar -->
    <header class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm">
        <div class="container mx-auto px-4 py-4">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <!-- Logo y título -->
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-500 rounded-full flex items-center justify-center shadow-md">
                        <i class="fas fa-utensils text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Restaurante Delicias</h1>
                        <p class="text-sm text-gray-600">Menú Digital Interactivo</p>
                    </div>
                </div>

                <!-- Botón QR -->
                <a href="{{ route('qr.generate') }}"
                   target="_blank"
                   class="inline-flex items-center justify-center space-x-2 px-5 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all shadow-md hover:shadow-lg w-full md:w-auto">
                    <i class="fas fa-qrcode text-lg"></i>
                    <span class="font-medium">Escanea el QR</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Pestañas de categorías -->
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4">
            <div class="flex overflow-x-auto scrollbar-hide">
                @foreach($categories as $index => $category)
                    <button class="tab-button flex-shrink-0 px-6 py-4 font-medium transition-all border-b-2 whitespace-nowrap
                                {{ $loop->first ? 'border-orange-500 text-orange-600 bg-orange-50' : 'border-transparent text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}"
                            data-tab="{{ $category->slug }}">
                        <i class="fas {{ $loop->first ? 'fa-fire' : ($loop->index == 1 ? 'fa-hamburger' : 'fa-pizza-slice') }} mr-2"></i>
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Contenido principal -->
    <main class="container mx-auto px-4 py-8">
        @foreach($categories as $index => $category)
            <div class="tab-content fade-in {{ $loop->first ? '' : 'hidden' }}"
                 id="tab-{{ $category->slug }}">

                <!-- Encabezado de categoría -->
                <div class="mb-10 text-center">
                    <div class="inline-flex items-center justify-center space-x-3 mb-4">
                        <div class="w-2 h-10 bg-orange-500 rounded-full"></div>
                        <h2 class="text-4xl font-bold text-gray-900">{{ $category->name }}</h2>
                        <div class="w-2 h-10 bg-orange-500 rounded-full"></div>
                    </div>

                    @if($category->description)
                        <p class="text-lg text-gray-600 max-w-3xl mx-auto">{{ $category->description }}</p>
                    @endif

                    <div class="mt-6">
                        <span class="inline-block px-4 py-2 bg-orange-100 text-orange-800 rounded-full text-sm font-medium">
                            <i class="fas fa-utensils mr-2"></i>
                            {{ $category->activeItems->count() }} productos disponibles
                        </span>
                    </div>
                </div>

                <!-- Grid de productos -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach($category->activeItems as $item)
                        <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                            <!-- Imagen con overlay -->
                            <div class="relative h-56 overflow-hidden">
                                <img src="{{ $item->image_url }}"
                                     alt="{{ $item->name }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                                <!-- Overlay gradient -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                <!-- Badges -->
                                <div class="absolute top-4 left-4 flex flex-col gap-2">
                                    @if($item->is_featured)
                                        <span class="bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-md">
                                            <i class="fas fa-star mr-1"></i> Destacado
                                        </span>
                                    @endif
                                    @if($item->preparation_time && $item->preparation_time <= 15)
                                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-md">
                                            <i class="fas fa-bolt mr-1"></i> Rápido
                                        </span>
                                    @endif
                                </div>

                                <!-- Precio -->
                                <div class="absolute bottom-4 right-4 bg-white/95 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg">
                                    <span class="font-bold text-xl text-gray-900">{{ $item->formattedPrice() }}</span>
                                </div>
                            </div>

                            <!-- Información del producto -->
                            <div class="p-6">
                                <div class="mb-3">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-1">{{ $item->name }}</h3>
                                    <p class="text-gray-600 line-clamp-2">{{ $item->description }}</p>
                                </div>

                                <!-- Ingredientes -->
                                <div class="mb-4">
                                    <h4 class="font-medium text-gray-900 mb-2 flex items-center">
                                        <i class="fas fa-list-ul text-orange-500 mr-2"></i>
                                        <span class="text-sm">Ingredientes:</span>
                                    </h4>
                                    <p class="text-sm text-gray-700 line-clamp-3">{{ $item->ingredients }}</p>
                                </div>

                                <!-- Detalles adicionales -->
                                <div class="flex items-center justify-between text-sm text-gray-500 mb-6 pt-4 border-t border-gray-100">
                                    <div class="flex items-center space-x-4">
                                        @if($item->calories)
                                            <span class="flex items-center" title="Calorías">
                                                <i class="fas fa-fire text-red-400 mr-1"></i>
                                                <span>{{ $item->calories }} cal</span>
                                            </span>
                                        @endif

                                        @if($item->preparation_time)
                                            <span class="flex items-center" title="Tiempo de preparación">
                                                <i class="fas fa-clock text-blue-400 mr-1"></i>
                                                <span>{{ $item->preparation_time }} min</span>
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Rating -->
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-400 mr-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                        <span class="text-gray-600 text-xs">({{ rand(20, 150) }})</span>
                                    </div>
                                </div>

                                <!-- Botón de información -->
                                <div class="text-center">
                                    <button onclick="showProductDetails({{ json_encode([
                                        'id' => $item->id,
                                        'name' => $item->name,
                                        'description' => $item->description,
                                        'ingredients' => $item->ingredients,
                                        'price' => $item->price,
                                        'calories' => $item->calories,
                                        'preparation_time' => $item->preparation_time,
                                        'image_url' => $item->image_url
                                    ]) }})"
                                            class="inline-flex items-center justify-center space-x-2 px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-medium rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all w-full group/btn">
                                        <i class="fas fa-info-circle group-hover/btn:rotate-90 transition-transform"></i>
                                        <span>Ver detalles</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </main>

    <!-- Modal de detalles del producto -->
    <div id="product-modal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden">
            <div class="relative">
                <!-- Header del modal -->
                <div class="flex items-center justify-between p-6 border-b border-gray-200">
                    <h3 id="modal-title" class="text-2xl font-bold text-gray-900"></h3>
                    <button onclick="closeProductModal()"
                            class="text-gray-500 hover:text-gray-700 text-2xl">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Contenido del modal -->
                <div class="overflow-y-auto max-h-[60vh] p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Imagen -->
                        <div>
                            <img id="modal-image" src="" alt="" class="w-full h-64 object-cover rounded-xl shadow-lg">
                        </div>

                        <!-- Información -->
                        <div>
                            <div class="mb-4">
                                <h4 class="font-bold text-gray-900 mb-2">Descripción:</h4>
                                <p id="modal-description" class="text-gray-600"></p>
                            </div>

                            <div class="mb-4">
                                <h4 class="font-bold text-gray-900 mb-2">Ingredientes:</h4>
                                <p id="modal-ingredients" class="text-gray-700"></p>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="text-center p-3 bg-gray-50 rounded-lg">
                                    <div class="text-2xl font-bold text-orange-600" id="modal-price"></div>
                                    <div class="text-sm text-gray-600">Precio</div>
                                </div>
                                <div class="text-center p-3 bg-gray-50 rounded-lg">
                                    <div class="text-2xl font-bold text-blue-600" id="modal-calories"></div>
                                    <div class="text-sm text-gray-600">Calorías</div>
                                </div>
                                <div class="text-center p-3 bg-gray-50 rounded-lg">
                                    <div class="text-2xl font-bold text-green-600" id="modal-time"></div>
                                    <div class="text-sm text-gray-600">Tiempo</div>
                                </div>
                                <div class="text-center p-3 bg-gray-50 rounded-lg">
                                    <div class="flex items-center justify-center text-2xl text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <div class="text-sm text-gray-600">Calificación</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer del modal -->
                <div class="p-6 border-t border-gray-200 bg-gray-50">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button onclick="closeProductModal()"
                                class="flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-100 transition-colors">
                            Cerrar
                        </button>
                        <button onclick="shareProduct()"
                                class="flex-1 px-6 py-3 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors flex items-center justify-center space-x-2">
                            <i class="fas fa-share-alt"></i>
                            <span>Compartir</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-gray-900 to-gray-800 text-white py-12 mt-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Información del restaurante -->
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-utensils text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">Restaurante Delicias</h3>
                            <p class="text-gray-300">Desde 1990</p>
                        </div>
                    </div>
                    <p class="text-gray-400 mb-6">
                        Más de 30 años ofreciendo los mejores sabores con ingredientes frescos y recetas tradicionales.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-orange-500 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-orange-500 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-orange-500 transition-colors">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-orange-500 transition-colors">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                </div>

                <!-- Horario -->
                <div>
                    <h4 class="text-xl font-bold mb-6 flex items-center">
                        <i class="fas fa-clock text-orange-400 mr-3"></i>
                        Horario de Atención
                    </h4>
                    <ul class="space-y-4">
                        <li class="flex items-center justify-between pb-3 border-b border-gray-700">
                            <span class="text-gray-300">Lunes a Viernes</span>
                            <span class="font-medium">11:00 AM - 10:00 PM</span>
                        </li>
                        <li class="flex items-center justify-between pb-3 border-b border-gray-700">
                            <span class="text-gray-300">Sábados</span>
                            <span class="font-medium">11:00 AM - 11:00 PM</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <span class="text-gray-300">Domingos</span>
                            <span class="font-medium">12:00 PM - 9:00 PM</span>
                        </li>
                    </ul>

                    <div class="mt-8 p-4 bg-gray-800/50 rounded-lg">
                        <p class="text-sm text-gray-400">
                            <i class="fas fa-info-circle text-orange-400 mr-2"></i>
                            Reservas recomendadas para grupos de 6 o más personas.
                        </p>
                    </div>
                </div>

                <!-- Contacto -->
                <div>
                    <h4 class="text-xl font-bold mb-6 flex items-center">
                        <i class="fas fa-phone-alt text-orange-400 mr-3"></i>
                        Contáctanos
                    </h4>
                    <ul class="space-y-5">
                        <li class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-orange-400"></i>
                            </div>
                            <div>
                                <p class="font-medium">Dirección</p>
                                <p class="text-gray-400">Av. Principal #123, Centro Histórico</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-orange-400"></i>
                            </div>
                            <div>
                                <p class="font-medium">Teléfono</p>
                                <p class="text-gray-400">(123) 456-7890</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-orange-400"></i>
                            </div>
                            <div>
                                <p class="font-medium">Email</p>
                                <p class="text-gray-400">info@delicias.com</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-truck text-orange-400"></i>
                            </div>
                            <div>
                                <p class="font-medium">Delivery</p>
                                <p class="text-gray-400">Servicio disponible en toda la ciudad</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Divider y copyright -->
            <div class="border-t border-gray-700 mt-12 pt-8 text-center">
                <p class="text-gray-400 mb-4">
                    <i class="fas fa-qrcode text-orange-400 mr-2"></i>
                    Escanea el código QR para acceder a este menú desde cualquier dispositivo
                </p>
                <p class="text-gray-500 text-sm">
                    © {{ date('Y') }} Restaurante Delicias. Todos los derechos reservados. |
                    <a href="{{ route('qr.generate') }}" target="_blank" class="text-orange-400 hover:text-orange-300">
                        Código QR del menú
                    </a>
                </p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
