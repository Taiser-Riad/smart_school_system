<!-- Teacher Message -->
<h2>You are a teacher</h2>

<!-- Logout Form -->
<form method="POST" action="{{ route('logout') }}">
    @csrf <!-- CSRF Token for form security -->

    <!-- Logout Button -->
    <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
        {{ __('Log Out') }}
    </button>
</form>
