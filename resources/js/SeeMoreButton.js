  // Add an event listener to the "See More" button
    document.getElementById("seeMoreButton").addEventListener("click", function(event) {
        // Check if the user is authenticated
        @auth
            // User is logged in, do nothing
        @else
            // User is not logged in, show the message
            event.preventDefault(); // Prevent the default link behavior
            document.getElementById("loginMessage").style.display = "inline"; // Display the message
        @endauth
    });