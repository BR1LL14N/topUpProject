<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Status Cards</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'accent': '#3b82f6',
          }
        }
      }
    }
  </script>
</head>
<body class="bg-gray-100 min-h-screen p-4">
  <div class="container mx-auto">
    <h1 class="text-2xl font-bold text-accent mb-4">Order Status</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4">
      <!-- Order Card (Pending) -->
      <div class="card bg-white shadow-xl">
        <figure class="px-4 pt-4">
          <div class="w-full h-32 bg-gray-300 rounded-lg flex items-center justify-center">
            <span class="text-gray-600">Game Image</span>
          </div>
        </figure>
        <div class="card-body">
          <h2 class="card-title text-accent">Order #12345</h2>
          <p>Game: Example Game</p>
          <p>Amount: $10.00</p>
          <div class="card-actions justify-end mt-2">
            <div class="badge badge-warning">Pending</div>
          </div>
        </div>
      </div>

      <!-- Order Card (Processing) -->
      <div class="card bg-white shadow-xl">
        <figure class="px-4 pt-4">
          <div class="w-full h-32 bg-gray-300 rounded-lg flex items-center justify-center">
            <span class="text-gray-600">Game Image</span>
          </div>
        </figure>
        <div class="card-body">
          <h2 class="card-title text-accent">Order #67890</h2>
          <p>Game: Another Game</p>
          <p>Amount: $25.00</p>
          <div class="card-actions justify-end mt-2">
            <div class="badge badge-info">Processing</div>
          </div>
        </div>
      </div>

      <!-- Order Card (Success) -->
      <div class="card bg-white shadow-xl">
        <figure class="px-4 pt-4">
          <div class="w-full h-32 bg-gray-300 rounded-lg flex items-center justify-center">
            <span class="text-gray-600">Game Image</span>
          </div>
        </figure>
        <div class="card-body">
          <h2 class="card-title text-accent">Order #54321</h2>
          <p>Game: Cool Game</p>
          <p>Amount: $50.00</p>
          <div class="card-actions justify-end mt-2">
            <div class="badge badge-success">Success</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
