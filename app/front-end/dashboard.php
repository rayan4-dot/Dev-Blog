<?php
// session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);
// if (!isset($_SESSION['username'])) {
//     header("Location: login.php");
//     exit;

// Include the Dashboard class
require_once '../class/Dashboard/dashboard.php';
require_once '../handler/d.php';


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 h-screen">
    <div class="flex h-full">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-900 text-white flex flex-col">
            <div class="p-4 text-xl font-bold">Admin</div>
            <nav class="flex-1">
                <ul class="space-y-2">
                    <li><a href="dashboard.php" class="block px-4 py-2 hover:bg-blue-700 font-bold">Home</a></li>
                    <li><a href="user.php" class="block px-4 py-2 hover:bg-blue-700">Users</a></li>
                    <li><a href="category.php" class="block px-4 py-2 hover:bg-blue-700">Category</a></li>
                    <li><a href="tag.php" class="block px-4 py-2 hover:bg-blue-700">Tag</a></li>
                    <li><a href="article.php" class="block px-4 py-2 hover:bg-blue-700">Article</a></li>
                </ul>
            </nav>
            <div class="p-4">
                <form action="dashboard.php" method="POST">
                    <button type="submit" name="logout" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700">Logout</button>
                </form>
            </div>
            <div class="p-4 text-sm text-center">&copy; <span id="year"></span> Dev-Blog</div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Welcome Section -->
            <div class="bg-white shadow-md rounded-lg p-4 mb-6">
                <h2 class="text-2xl font-bold">Dashboard</h2>
            </div>

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold">Total Users</h3>
                    <p class="text-3xl font-bold"><?php echo $totalUsers; ?></p>
                </div>
                <div class="bg-green-500 text-white p-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold">Total Articles</h3>
                    <p class="text-3xl font-bold"><?php echo $totalArticles; ?></p>
                </div>
                <div class="bg-yellow-500 text-white p-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold">Categories</h3>
                    <p class="text-3xl font-bold"><?php echo $totalCategories; ?></p>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold mb-4">User Growth</h3>
                    <canvas id="userChart"></canvas>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold mb-4">Article Statistics</h3>
                    <canvas id="articleChart"></canvas>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Set dynamic year in footer
        document.getElementById('year').textContent = new Date().getFullYear();

        // User Growth Chart
        const userCtx = document.getElementById('userChart').getContext('2d');
        new Chart(userCtx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'New Users',
                    data: [10, 15, 20, 25, 30, 35],  // Replace with actual user growth data
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true
            }
        });

        // Article Statistics Chart
        const articleCtx = document.getElementById('articleChart').getContext('2d');
        new Chart(articleCtx, {
            type: 'bar',
            data: {
                labels: ['Category 1', 'Category 2', 'Category 3', 'Category 4'], // Replace with actual category names
                datasets: [{
                    label: 'Articles',
                    data: [12, 19, 3, 5],  // Replace with actual article data per category
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 205, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 205, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
</body>
</html>