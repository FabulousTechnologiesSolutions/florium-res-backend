<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.template.csslinks')
    <title>Restaurant Search</title>
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

                                restaurant.numberOfGoogleReviews = placeDetails.reviews ? placeDetails.reviews.length : 0;

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
            const totalReviews = restaurant.reviews.length; 

              // Calculate the sum of total reviews by clients
              let totalRating = 0;
            restaurant.reviews.forEach(review => {
                totalRating += review.rating;
            });

            const averageRating = totalRating / totalReviews;

            const queryString = `?name=${encodeURIComponent(restaurant.name)}&address=${encodeURIComponent(restaurant.address)}&totalReviews=${totalReviews}&rating=${restaurant.rating}&latitude=${restaurant.latitude}&longitude=${restaurant.longitude}&types=${encodeURIComponent(JSON.stringify(restaurant.types))}&phone=${encodeURIComponent(restaurant.phone)}&website=${encodeURIComponent(restaurant.website)}&isOpen=${restaurant.isOpen}&id=${restaurantId}&photos=${encodeURIComponent(JSON.stringify(restaurant.photos))}`;
            
            // const ratingStars = getRatingStars(restaurant.rating);
            // const restaurantId = restaurant.id;
            // const queryString = `?name=${encodeURIComponent(restaurant.name)}&address=${encodeURIComponent(restaurant.address)}&rating=${restaurant.rating}&latitude=${restaurant.latitude}&longitude=${restaurant.longitude}&types=${encodeURIComponent(JSON.stringify(restaurant.types))}&phone=${encodeURIComponent(restaurant.phone)}&website=${encodeURIComponent(restaurant.website)}&isOpen=${restaurant.isOpen}&id=${restaurantId}&photos=${encodeURIComponent(JSON.stringify(restaurant.photos))}`;
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
    <div class="container">
        <div class="row justify-content-between ">
            <h2 class="fs-1 mt-4 fw-normal text-center text-prpl">
                Restaurants
            </h2>
            <p class="text-secondary text-center fs-5">The Most frequently searched and most popular apartment of
                the application will be in the list </p>
        </div>
    </div>
    <div id="map" style="height: 400px;" class="d-none"></div>
    <div class="container">
        <div id="response" class="row mb-3"></div>
    </div>
    @include('admin.template.footer')
    @include('admin.template.loinsignup')
    @include('admin.template.jslinks')
</body>
<script>
    $(document).ready(function () {
        searchRestaurants('{{$location}}','{{$foodType}}')
    })
</script>
<script>
    function openTab(queryString) {
        // Open the URL in a new tab
        window.open("detailssearch" + queryString, "_blank");
    }
</script>

</html>