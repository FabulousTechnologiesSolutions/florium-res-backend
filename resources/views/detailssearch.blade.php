<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('admin.template.csslinks')
</head>

<body>
    <script>
        window.onload = function() {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const name = urlParams.get('name');
            const address = urlParams.get('address');
            const rating = urlParams.get('rating');
            const types = JSON.parse(urlParams.get('types'));
            const phone = urlParams.get('phone');
            const website = urlParams.get('website');
            const isOpen = urlParams.get('isOpen');
            const id = urlParams.get('id');
            const photos = JSON.parse(urlParams.get('photos'));
            const latitude = urlParams.get('latitude');
            const longitude = urlParams.get('longitude');
            console.log("Latitude: " + latitude);
            console.log("Longitude: " + longitude);
            document.querySelectorAll('.latitude').forEach(elem => {
                elem.innerText = latitude;
            });
            document.querySelectorAll('.longitude').forEach(elem => {
                elem.innerText = longitude;
            });
            document.querySelectorAll('.name').forEach(elem => {
                elem.innerText = name;
            });
            document.querySelectorAll('.address').forEach(elem => {
                elem.innerText = address;
            });
            document.querySelectorAll('.rating').forEach(elem => {
                elem.innerText = rating;
            });
            document.querySelectorAll('.types').forEach(elem => {
                elem.innerText = types.join(', ');
            });
            document.querySelectorAll('.phone').forEach(elem => {
                elem.innerText = phone; // Set phone number text
                elem.href = "tel:" + phone; 
            });
            document.querySelectorAll('.website').forEach(elem => {
                elem.innerText = website;
                elem.href = website; 
            });
            document.querySelectorAll('.isOpen').forEach(elem => {
                elem.innerText = isOpen;
            });
            document.querySelectorAll('.id').forEach(elem => {
                elem.innerText = id;
            });
    
            const glry1Container = document.querySelector('.glry1 img');
            const glry2Container = document.querySelector('.glry2 img');
            const glry3Container = document.querySelector('.glry3 img');
            const glry4Container = document.querySelector('.glry4 img');
            const glry5Container = document.querySelector('.glry5 img');
    
            photos.forEach((photoUrl, index) => {
                if (index === 0) {
                    glry1Container.src = photoUrl;
                } else if (index === 1) {
                    glry2Container.src = photoUrl;
                } else if (index === 2) {
                    glry3Container.src = photoUrl;
                } else if (index === 3) {
                    glry4Container.src = photoUrl;
                } else if (index === 4) {
                    glry5Container.src = photoUrl;
                }
            });

            const imgContainers = document.querySelectorAll('.center2 img');
            for (let index = 0; index < Math.min(6, photos.length); index++) {
                imgContainers[index].src = photos[index];
            }
        }
    </script>
    <script>
        const ratingValue = fetchRatingValue();
        function fetchRatingValue() {
            return Math.random() * 5;
        }
        const starsContainer = document.querySelector('.stars-container');
        starsContainer.innerHTML = '';
        const filledStarsCount = Math.floor(ratingValue);
        const hasHalfStar = ratingValue % 1 !== 0;
    
        for (let i = 0; i < filledStarsCount; i++) {
            const star = document.createElement('i');
            star.classList.add('fa-solid', 'fs-5', 'yellow', 'fa-star');
            starsContainer.appendChild(star);
        }
    
        if (hasHalfStar) {
            const halfStar = document.createElement('i');
            halfStar.classList.add('fa-solid', 'fs-5', 'yellow', 'fa-star-half-alt');
            starsContainer.appendChild(halfStar);
        }
    
        const remainingStarsCount = 5 - filledStarsCount - (hasHalfStar ? 1 : 0);
        for (let i = 0; i < remainingStarsCount; i++) {
            const star = document.createElement('i');
            star.classList.add('fa-solid', 'fs-5', 'gray', 'fa-star');
            starsContainer.appendChild(star);
        }
    
        const ratingText = document.querySelector('.rating');
        ratingText.textContent = ratingValue.toFixed(2);
    </script>
    @include('admin.template.navbar')
    <section class="py-5 py-sm-5 ">
        <div class="mycontainer ">
            <div class="position-relative bg-ltw p-4 sld">
                <div class="center2 ">
                    <div class="img1">
                        <img src="" alt="ee" class="sldimg">
                    </div>
                    <div class="img2">
                        <img src="" alt="ee" class="sldimg">
                    </div>
                    <div class="img3">
                        <img src="" alt="ee" class="sldimg">
                    </div>
                    <div class="img4">
                        <img src="" alt="ee" class="sldimg">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="my-3">
        <div class="mycontainer">
            <div class="row">
                <div class="col-lg-8">
                    <p class="bg-success d-inline-block text-white rounded-3 px-3 py-2 mb-0 isOpen">
                    </p>
                    <h2 class="fs-3 mt-3 name">
                    </h2>
                    <div class="d-flex align-items-center">
                        <div class="me-3 stars-container">
                            <i class="fa-solid fs-5 yellow fa-star"></i>
                            <i class="fa-solid fs-5 yellow fa-star"></i>
                            <i class="fa-solid fs-5 yellow fa-star"></i>
                            <i class="fa-solid fs-5 yellow fa-star"></i>
                            <i class="fa-solid fs-5 gray fa-star"></i>
                        </div>
                        <div class="d-flex">
                            <p class="mb-0 rating"></p>
                            <p class="mb-0 ">/5.00</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex my-2 align-items-center col-xl-9">
                            <img src="{{ asset('img/abt1.png') }}" alt="" class="det-img me-2">
                            <p class="text-prpl mb-0 address"></p>
                        </div>
                        <div class="d-flex my-2 align-items-center">
                            <img src="{{ asset('img/abt2.png') }}" alt="" class="det-img me-2">
                            <p class="text-prpl mb-0 types"></p>
                        </div>
                    </div>
                    <div class="tab-container mt-5">
                        <div class="tab tab1" data-tab="tab1">About</div>
                        <div class="tab tab2" data-tab="tab2">Ratings</div>
                    </div>
                    <div id="tab1" class="tab-content px-0" style="display: block;">
                        <div class="col-sm-10 col-md-8">
                            <div class="mt-4">
                                <h2 class="fs-2">
                                    User Photos
                                </h2>
                                <div class="mt-3 d-flex h-75">
                                    <div class="col-4 d-flex flex-column">
                                        <div class="py-1 glry1">
                                            <img src="" alt="" class="w-100 h-100 object-cover rounded-3">
                                        </div>
                                        <div class="py-1 glry2">
                                            <img src="" alt="" class="w-100 h-100 object-cover rounded-3">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="py-1 px-2 h-100 glry3">
                                            <img src="" alt="" class="w-100 h-100 object-cover rounded-3">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="py-1 glry4">
                                            <img src="" alt="" class="w-100 h-100 object-cover rounded-3">
                                        </div>
                                        <div class="py-1 glry5">
                                            <img src="" alt="" class="w-100 h-100 object-cover rounded-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" class="tab-content px-0" style="display: block;">
                        <div class="mt-4">
                            <h2 class="fs-2">
                                Reviews
                            </h2>
                            <div class="mt-3 row">
                                <div class="col-md-6">
                                    <div class="bg-notice ">
                                        <div class="px-3 py-3 d-flex align-items-center">
                                            <div
                                                class="d-flex align-items-center py-4 px-3 border-prpl rounded-circle me-3">
                                                <p class="mb-0 "><span class="rating"></span><span>/</span></p>
                                                <p class="mt-3 mb-0 small">5.0</p>
                                            </div>
                                            <div>
                                                <p class="mb-0 text-prpl fs-5">
                                                    Total Reviews
                                                </p>
                                                <p clss="mb-0 small"> reviews</p>
                                                <div class="mt-2">
                                                    <i class="fa-solid fs-5 yellow fa-star"></i>
                                                    <i class="fa-solid fs-5 yellow fa-star"></i>
                                                    <i class="fa-solid fs-5 yellow fa-star"></i>
                                                    <i class="fa-solid fs-5 yellow fa-star"></i>
                                                    <i class="fa-solid fs-5 gray fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3 mt-md-0 det-progress">
                                    <div class="bg-notice h-100 px-3 py-3">
                                        <div class="row align-items-center my-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-xl-2">
                                                <p class="mb-0">
                                                    5
                                                </p>
                                            </div>
                                            <div class="col-9 col-sm-10 col-md-9 col-xl-10">
                                                <div class="progress shadow rounded-pill w-100">
                                                    <div class="progress-bar bg-prpl rounded-pill" style="width:70%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center my-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-xl-2">
                                                <p class="mb-0">
                                                    4
                                                </p>
                                            </div>
                                            <div class="col-9 col-sm-10 col-md-9 col-xl-10">
                                                <div class="progress shadow rounded-pill w-100">
                                                    <div class="progress-bar bg-prpl rounded-pill" style="width:50%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center my-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-xl-2">
                                                <p class="mb-0">
                                                    3
                                                </p>
                                            </div>
                                            <div class="col-9 col-sm-10 col-md-9 col-xl-10">
                                                <div class="progress shadow rounded-pill w-100">
                                                    <div class="progress-bar bg-prpl rounded-pill" style="width:30%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center my-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-xl-2">
                                                <p class="mb-0">
                                                    2
                                                </p>
                                            </div>
                                            <div class="col-9 col-sm-10 col-md-9 col-xl-10">
                                                <div class="progress shadow rounded-pill w-100">
                                                    <div class="progress-bar bg-prpl rounded-pill" style="width:20%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center my-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-xl-2">
                                                <p class="mb-0">
                                                    1
                                                </p>
                                            </div>
                                            <div class="col-9 col-sm-10 col-md-9 col-xl-10">
                                                <div class="progress shadow rounded-pill w-100">
                                                    <div class="progress-bar bg-prpl rounded-pill" style="width:10%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-100 col-lg-4 ">
                    <div class=" shadow rounded-4 ">
                        <div class="px-3 py-3 bg-white text-prpl head-radius  myshadow ">
                            <p class="mb-0 fw-md fs-6">
                                Restaurant Link and Phone Number
                            </p>
                        </div>
                        <div class="py-4 px-3">
                            <a href="" class="website d-block text-black text-break" target="_blank"></a>
                            <a href="tel:" class="phone d-block text-decoration-none text-black mt-3"
                                target="_blank"></a>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div id="map" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
    </section>
    @include('admin.template.jslinks')

</body>

<script>

    let map;

    async function initMap() {
        // Get latitude and longitude values from URL parameters
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const latitude = parseFloat(urlParams.get('latitude'));
        const longitude = parseFloat(urlParams.get('longitude'));
        
        // The map, centered at the retrieved position
        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15, // Adjust zoom level as needed
            center: { lat: latitude, lng: longitude },
        });

        // Create a marker for the retrieved position
        const marker = new google.maps.Marker({
            position: { lat: latitude, lng: longitude },
            map: map,
            title: "Restaurant Location",
        });
    }

    function loadMapScript() {
        const script = document.createElement("script");
        script.src = `https://maps.googleapis.com/maps/api/js?key=AIzaSyAu1gwHCSzLG9ACacQqLk-LG8oJMkarNF0&libraries=drawing,places&callback=initMap`;
        script.defer = true;
        script.async = true;
        document.head.appendChild(script);
    }

    loadMapScript();

</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAu1gwHCSzLG9ACacQqLk-LG8oJMkarNF0&libraries=drawing,places&callback=initMap">
</script>
</html>