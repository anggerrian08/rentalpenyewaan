<html>
<head>
  <title>Register Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <script>
    tailwind.config = {
      theme: {
        extend: {
          animation: {
            fadeIn: "fadeIn 1s ease-in-out",
            slideIn: "slideIn 1s ease-out",
          },
          keyframes: {
            fadeIn: {
              "0%": { opacity: 0 },
              "100%": { opacity: 1 },
            },
            slideIn: {
              "0%": { transform: "translateY(-20px)", opacity: 0 },
              "100%": { transform: "translateY(0)", opacity: 1 },
            },
          },
        },
      },
    };
  </script>
</head>
<body class="bg-gray-100">
  <div class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <header class="bg-white shadow-md animate-slideIn">
      <div class="container mx-auto flex justify-between items-center py-4 px-6">
        <div class="text-2xl font-bold text-teal-600">RENTAL MOBIL APP</div>
      </div>
    </header>

    <!-- Main Content -->
    <main class="flex flex-1 justify-center items-center p-6">
      <div class="bg-white shadow-lg rounded-lg overflow-hidden max-w-4xl w-full md:flex animate-fadeIn">
        <!-- Illustration Section -->
        <div class="hidden md:block w-1/2 animate-slideIn">
          <img
            src="https://storage.googleapis.com/a1aa/image/7xQ35rWGuBqnHh9hw9d9feJt3Fgi11QYQZXHPM0xTeXvlkpnA.jpg"
            alt="Illustration of people working with data charts and graphs"
            class="w-full h-full object-cover animate-fadeIn"
          />
        </div>

        <!-- Form Section -->
        <div class="w-full md:w-1/2 p-8 animate-slideIn">
          <h2 class="text-3xl font-semibold mb-6 text-center text-gray-800">Create Your Account</h2>
          <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="mb-4">
              <label class="block text-gray-700 font-medium mb-2" for="name">Full Name</label>
              <input
                type="text"
                id="name"
                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Full Name" name="name"
              />
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 font-medium mb-2" for="email">Email Address</label>
              <input
                type="email"
                id="email"
                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Email Address" name="email"
              />
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 font-medium mb-2" for="password">Password</label>
              <input
                type="password"
                id="password"
                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Password" name="password"
              />
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 font-medium mb-2" for="confirm-password">Confirm Password</label>
              <input
                type="password"
                id="confirm-password"
                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Confirm Password" name="password_confirmation"
              />
            </div>
            <div class="flex justify-between space-x-4 mb-6">
              <button
                type="submit"
                class="bg-blue-500 text-white w-full py-3 rounded-lg hover:bg-blue-600 hover:scale-105 transition-transform"
              >
                Register
              </button>
              <a
                href="login"
                class="bg-white border border-gray-300 w-full py-3 text-gray-700 text-center rounded-lg hover:bg-gray-100 hover:scale-105 transition-transform"
              >
                Back to Login
              </a>
            </div>
            <p class="text-center text-gray-700">
              Already have an account?
              <a href="login" class="text-blue-500 hover:underline">Sign In</a>
            </p>
          </form>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
