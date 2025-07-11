<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- or use CDN if needed -->
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="w-full max-w-md p-6 bg-white rounded shadow-md">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16 w-16">
        </div>

        @if ($errors->any())
            <div class="mb-4 text-sm text-red-600">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="middle_initial" class="block text-sm font-medium text-gray-700">Middle Initial</label>
                <input id="middle_initial" type="text" name="middle_initial" value="{{ old('middle_initial') }}"
                    maxlength="1"
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
            </div>


            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                       required
                       class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" name="password" required
                       class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                       <div class="text-sm text-gray-600 mt-2 space-y-1" id="password-rules">
                        <p id="rule-lowercase" class="text-red-500">• At least one lowercase letter</p>
                        <p id="rule-uppercase" class="text-red-500">• At least one uppercase letter</p>
                        <p id="rule-number" class="text-red-500">• At least one number</p>
                        <p id="rule-symbol" class="text-red-500">• At least one symbol (@$!%*?&)</p>
                        <p id="rule-length" class="text-red-500">• Minimum 8 characters</p>
                    </div>

            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-blue-600 hover:underline" href="{{ route('login') }}">
                    Already registered?
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none">
                    Register
                </button>
            </div>
        </form>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const password = document.getElementById('password');

        const rules = {
            lowercase: document.getElementById('rule-lowercase'),
            uppercase: document.getElementById('rule-uppercase'),
            number: document.getElementById('rule-number'),
            symbol: document.getElementById('rule-symbol'),
            length: document.getElementById('rule-length')
        };

        password.addEventListener('input', function () {
            const val = password.value;

            rules.lowercase.classList.toggle('text-green-600', /[a-z]/.test(val));
            rules.uppercase.classList.toggle('text-green-600', /[A-Z]/.test(val));
            rules.number.classList.toggle('text-green-600', /\d/.test(val));
            rules.symbol.classList.toggle('text-green-600', /[@$!%*?&]/.test(val));
            rules.length.classList.toggle('text-green-600', val.length >= 8);

            for (const key in rules) {
                if (!rules[key].classList.contains('text-green-600')) {
                    rules[key].classList.add('text-red-500');
                } else {
                    rules[key].classList.remove('text-red-500');
                }
            }
        });
    });
</script>

</body>
</html>
