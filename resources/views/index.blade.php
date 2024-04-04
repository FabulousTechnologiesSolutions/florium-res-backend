<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.template.csslinks')
    <title>Home</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAu1gwHCSzLG9ACacQqLk-LG8oJMkarNF0&libraries=places">
    </script>
    <script>
        var restaurants = [];
        var idCounter = 0; 

        function searchRestaurants(location, foodType) {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 15
            });

            var request = {
                location: map.getCenter(),
                radius: '500',
                query: location + ' ' + foodType + ' restaurants'
            };

            var service = new google.maps.places.PlacesService(map);

            service.textSearch(request, function(results, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    results.forEach(function(place) {
                        var restaurant = {
                            name: place.name,
                            address: place.formatted_address,
                            rating: place.rating,
                            types: place.types,
                            phone: '',
                            website: '',
                            isOpen: '',
                            reviews: [],
                            photos: [],
                            latitude: place.geometry.location.lat(),
                            longitude: place.geometry.location.lng(),
                            id: idCounter++ // Assign unique ID using idCounter
                        };
                        
                        // Fetch additional details for the place
                        service.getDetails({
                            placeId: place.place_id
                        }, function(placeDetails, status) {
                            if (status === google.maps.places.PlacesServiceStatus.OK) {
                                restaurant.phone = placeDetails.formatted_phone_number || 'N/A';
                                restaurant.website = placeDetails.website || 'N/A';

                                if (placeDetails.opening_hours && placeDetails.opening_hours.open_now !== undefined) {
                                    restaurant.isOpen = placeDetails.opening_hours.open_now ? 'Open' : 'Closed';
                                } else {
                                    restaurant.isOpen = 'Unknown';
                                }

                                if (placeDetails.reviews && placeDetails.reviews.length > 0) {
                                    placeDetails.reviews.forEach(function(review) {
                                        restaurant.reviews.push({
                                            author: review.author_name,
                                            rating: review.rating,
                                            text: review.text
                                        });
                                    });
                                }

                                if (placeDetails.photos && placeDetails.photos.length > 0) {
                                    placeDetails.photos.forEach(function(photo) {
                                        restaurant.photos.push(photo.getUrl({ maxWidth: 400 }));
                                    });
                                }
                            }
                            ResturantDiv(restaurant);
                        });
                    });
                } else {
                    document.getElementById('response').textContent = 'No restaurants found';
                }
            });
        }
        
        function updateResponse(restaurants) {
            document.getElementById('response').textContent = JSON.stringify(restaurants, null, 2);
        }
        function ResturantDiv(restaurant) {
            const ratingStars = getRatingStars(restaurant.rating);
            const restaurantId = restaurant.id;
            const queryString = `?name=${encodeURIComponent(restaurant.name)}&address=${encodeURIComponent(restaurant.address)}&rating=${restaurant.rating}&latitude=${restaurant.latitude}&longitude=${restaurant.longitude}&types=${encodeURIComponent(JSON.stringify(restaurant.types))}&phone=${encodeURIComponent(restaurant.phone)}&website=${encodeURIComponent(restaurant.website)}&isOpen=${restaurant.isOpen}&id=${restaurantId}&photos=${encodeURIComponent(JSON.stringify(restaurant.photos))}`;
            document.getElementById('response').insertAdjacentHTML("beforeend", `
                <div class="col-12 col-sm-6 col-lg-4 mt-3">
                    <div class="p-2 h-100 pointer restaurant-div" data-restaurant-id="${restaurantId}"  onclick="openTab('${queryString}')">
                        <div class="card h-100 cardjs p-3 pb-4 rounded-4 shadow-sm border-0">
                            <img src="${restaurant.photos.length > 0 ? restaurant.photos[0] : '{{ asset('img/ist.jpeg') }}'}" class="card-img-top rounded-4" alt="Restaurant Photo">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <i class="fa-solid text-prpl fa-location-dot fs-5"></i>
                                            <p class="mb-0 text-black mx-2 na locationjs">${restaurant['address']}</p>
                                        </div>
                                        <p class="mb-0 text-black mx-2 na locationjs">${restaurant['latitude']}</p>
                                        <p class="mb-0 text-black mx-2 na locationjs">${restaurant['longitude']}</p>
                                        <p class="mb-0 text-prpl fw-md fs-6 mt-1 namejs">${restaurant['name']}</p>
                                    </div>
                                    <a href="#"> <i class="fa-regular fs-3 text-prpl fa-heart text-black"></i></a>
                                </div>
                            </div>
                            <div class="d-flex mx-3 align-items-center">
                                    ${ratingStars}
                                </div>
                        </div>
                    </div>
                </div>
            `);
        }

        function getRatingStars(rating) {
            const roundedRating = Math.round(rating);
            let starsHTML = '';

            for (let i = 1; i <= 5; i++) {
                if (i <= roundedRating) {
                    starsHTML += '<i class="fa-solid fs-5 yellow fa-star"></i>';
                } else {
                    starsHTML += '<i class="fa-solid fs-5 gray fa-star"></i>';
                }
            }

            return starsHTML;
        }
    </script>
</head>

<body>
    @include('admin.template.navbar')
    <section class="my-4">
        @if (session('error'))
        <script>
            swal("Error!", "{{ session('error') }}", "error");
        </script>
        @endif
        <div class="mycontainer">
            <div class="row bg-hero position-relative align-items-center bg-prpl2 py-5 rounded-5 ">
                <div class="col-sm-6 col-lg-7 px-0 rounded-4 h-100 px-4 px-md-5 px-md-4 px-lg-5 position-relative">
                    <h1 class="display-4 fw-md text-center text-dark text-sm-start text-uppercase">BEST RESTAURANTS<br>
                        <span class="outline-text">NEAR YOU</span>
                    </h1>
                </div>
                <div class="col-sm-6 col-lg-5 px-4 position-relative">
                    <img src="{{ asset('img/home-img.png') }}" class="w-100 px-3 px-sm-0 px-4 px-xl-5" alt="">
                </div>
                <div class="col-sm-10 srchfltr position-relative px-4 px-md-5 px-md-4 px-lg-5 mt-3">
                    <form action="searchfilter" method="POST">
                        @csrf
                        <div class="row mx-0 justify-content-between bgw shadow py-3 py-md-4 px-2 px-lg-3 rounded-4">
                            <div class="col-md-4 my-1 my-md-0 col-sm-6">
                                <div class="rounded-3 filter-border bgw1 d-flex align-items-center px-3">
                                    <input name="location" id="locationInput" type="text"
                                        class="w-100 text-light bg-transparent focus-none pe-2 placeholder-white border-0 py-2 "
                                        placeholder="Location" required>
                                    <i class="fa-solid fa-location-dot text-white"></i>
                                </div>
                            </div>
                            <div class="col-md-4 my-1 my-md-0 col-sm-6">
                                <div class="rounded-3 filter-border bgw1 d-flex align-items-center px-3">
                                    <input name="foodType" type="text"
                                        class="w-100 text-light bg-transparent focus-none pe-2 placeholder-white border-0 py-2 "
                                        placeholder="Type" required>
                                    <i class="fa-solid fa-bowl-food text-white"></i>
                                </div>
                            </div>
                            <div class="col-md-4 my-1 my-md-0 col-sm-6">
                                <div class="rounded-3">
                                    <button type="submit"
                                        class="text-secondary  rounded-3 d-flex align-items-center focus-none  px-3 justify-content-between bg-prpl pe-3 border-0 py-2 w-100">
                                        <span class="me-2 text-dark">Search Now</span>
                                        <i class="fa-solid fa-magnifying-glass text-dark"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @include('admin.template.social')
            </div>
        </div>
    </section>
    @if (count($suggestion) > 0)
    <section>
        <div class="container">
            <div class="row justify-content-between ">
                <h2 class="fs-1 mt-4 fw-normal text-center text-prpl">
                    Suggestions
                </h2>
                <p class="text-secondary text-center fs-5">The Most frequently searched and most popular apartment of
                    the application will be in the list </p>
            </div>
        </div>
        <div id="map" style="height: 400px;" class="d-none"></div>
        <div class="container">
            <div id="response" class="row mb-3"></div>
        </div>
    </section>
    @endif
    @if (count($reviews) > 0)
    <section class="bg-ltw">
        <div class="mycontainer py-5 py-sm-5">
            <div class="row justify-content-between ">
                <h2 class="fs-1 fw-normal text-center mb-4 text-prpl">
                    Client Reviews
                </h2>
            </div>

            <div class="center client">
                @foreach ($reviews as $review)
                <div class="p-2">
                    <div class="card px-3 px-sm-4 py-4 rounded-4 border-0">
                        <div
                            class="d-flex flex-column flex-sm-row justify-content-center align-items-center mx-3 clientss">
                            <i class="fa-regular fs-1 fa-circle-user"></i>
                            <div class="mx-2">
                                <p class="mb-0 fw-bold">{{$review['name']}}</p>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <p class="">{{$review['msg']}}</p>
                            <i class="fa-solid mt-3 text-success fs-2 fa-quote-left"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @if (count($faqs) > 0)
    <section>
        <div class="mycontainer py-3 py-sm-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row justify-content-between">
                        <h2 class="fs-1 fw-normal text-center text-prpl">
                            Frequently Asked Questions
                        </h2>
                    </div>
                    @php
                    $i = 1;
                    @endphp
                    <div class="accordion" id="accordionExample">
                        @foreach ($faqs as $faq)
                        <div class="accordion-item my-3 border-0 shadow py-2 rounded-4 px-md-4">
                            <h2 class="accordion-header rounded-4 border-0 py-0" id="heading{{ $i }}">
                                <button class="accordion-button rounded-4 fs-5 fw-bold collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="false"
                                    aria-controls="collapse{{ $i }}">
                                    {{ $faq['title'] }}
                                </button>
                            </h2>
                            <div id="collapse{{ $i }}" class="accordion-collapse pt-0 mt-0 collapse"
                                aria-labelledby="heading{{ $i }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body pt-0 mt-0 text-secondary">
                                    {{ $faq['details'] }}
                                </div>
                            </div>
                        </div>
                        @php
                        $i += 1;
                        @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @include('admin.template.footer')
    @include('admin.template.loinsignup')
    @include('admin.template.jslinks')
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAu1gwHCSzLG9ACacQqLk-LG8oJMkarNF0&libraries=drawing,places&callback=initAutocomplete">
    </script>
    <script>
        function initAutocomplete() {
  var input = document.getElementById('locationInput');
  var input1 = document.getElementById('locationInput1');
  var input2 = document.getElementById('locationInput2');
  var input3 = document.getElementById('locationInput3');


  var autocomplete = new google.maps.places.Autocomplete(input);
  var autocomplete1 = new google.maps.places.Autocomplete(input1);
  var autocomplete2 = new google.maps.places.Autocomplete(input2);
  var autocomplete3 = new google.maps.places.Autocomplete(input3);

}

google.maps.event.addDomListener(window, 'load', initAutocomplete);
    </script>
</body>
<script>
    $(document).ready(function () {
        @foreach ($suggestion as $sug)                
        searchRestaurants('{{$sug->location}}','{{ $sug->foodType }}')
        @endforeach
    })
</script>

<script>
    function openTab(queryString) {
        // Open the URL in a new tab
        window.open("detailssearch" + queryString, "_blank");
    }
</script>

</html>