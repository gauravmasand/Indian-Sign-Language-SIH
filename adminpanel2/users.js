// Define the endpoint
// Define the endpoint
const endpoint = 'https://auth-web-api.onrender.com/api/users';

// Function to fetch user data and display it in the table
async function fetchAndDisplayUsers() {
    try {
        // Fetch data from the API
        const response = await fetch(endpoint);
        
        // Check if the response is ok (status in the range 200-299)
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        // Parse the JSON data
        const users = await response.json();
        
        // Get the table body element
        const tableBody = document.getElementById('userTableBody');
        
        // Clear the table body
        tableBody.innerHTML = '';

        // Initialize variables for analytics
        let totalUsers = 0;
        let activeUsers = 0;
        let inactiveUsers = 0;
        let peakUsageTime = {};
        let topPagesVisited = {};
        let newUsers = 0;
        let oldUsers = 0;
        
        // Loop through the users and create a table row for each
        users.forEach(user => {
            // Increment total users
            totalUsers++;

            // Check if the user is active or inactive (example based on last login date)
            const lastLogin = new Date(user.lastLogin);
            const currentDate = new Date();
            const timeDifference = currentDate - lastLogin;
            const daysInactive = timeDifference / (1000 * 3600 * 24); // days inactive

            if (daysInactive <= 30) {
                activeUsers++;
            } else {
                inactiveUsers++;
            }

            // Count peak usage time (example: hour of the day with most activity)
            const loginHour = lastLogin.getHours();
            peakUsageTime[loginHour] = (peakUsageTime[loginHour] || 0) + 1;

            // Count top pages visited (assuming `user.pagesVisited` is an array of pages visited)
            user.pagesVisited.forEach(page => {
                topPagesVisited[page] = (topPagesVisited[page] || 0) + 1;
            });

            // Count new and old users based on registration date (assuming `user.registrationDate`)
            const registrationDate = new Date(user.registrationDate);
            if (registrationDate.getFullYear() === currentDate.getFullYear()) {
                newUsers++;
            } else {
                oldUsers++;
            }

            // Create a new row in the table for each user
            const row = document.createElement('tr');

            // Assuming other fields are available such as `name`, `email`, `status`, etc.
            row.innerHTML = `
                <td><a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ${Math.floor(Math.random() * 10000)}</a></td>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-2">
                            <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-circle" />
                        </div>
                        <div class="flex-grow-1">${user.name}</div>
                    </div>
                </td>
                <td>${user.email}</td>
                <td><span class="text-success">${user.status}</span></td>
                <td>${user.lastLogin}</td>
            `;

            // Append the new row to the table body
            tableBody.appendChild(row);
        });

        // Calculate the Peak Usage Hour
        const peakUsageHour = Object.keys(peakUsageTime).reduce((a, b) => peakUsageTime[a] > peakUsageTime[b] ? a : b);

        // Display the metrics
        console.log(`Total Users: ${totalUsers}`);
        console.log(`Active Users: ${activeUsers}`);
        console.log(`Inactive Users: ${inactiveUsers}`);
        console.log(`Peak Usage Time: ${peakUsageHour}:00`);
        console.log(`New Users: ${newUsers}`);
        console.log(`Old Users: ${oldUsers}`);

        // Display the Top Pages Visited (top 3 pages)
        const sortedPages = Object.entries(topPagesVisited).sort((a, b) => b[1] - a[1]);
        console.log('Top Pages Visited:');
        sortedPages.slice(0, 3).forEach(page => {
            console.log(`${page[0]}: ${page[1]} visits`);
        });

    } catch (error) {
        console.error('Error fetching user data:', error);
    }
}

// Call the function to fetch and display users when the document is loaded
document.addEventListener('DOMContentLoaded', fetchAndDisplayUsers);
