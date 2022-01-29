<template>
    <Head title="Welcome" />

    <div class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0 bg-gray-700">
        <div class="absolute top-5 bg-gray-700">
            <img src="https://img.icons8.com/external-flatart-icons-lineal-color-flatarticons/100/000000/external-virus-search-virus-transmission-flatart-icons-lineal-color-flatarticons-1.png"
                class="w-full">
        </div>
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">
                Dashboard
            </Link>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 flex shadow rounded bg-white">
            <div class="">
                <h1 class="mb-4 pb-4 text-xl pt-28">
                Register to check current statistics about COVID-19 Around the world.
                </h1>
                <br />
                <a href="/register" class="bg-green-400 hover:bg-green-300 px-4 py-2 text-color-white mt-4 rounded shadow hover:shadow-lg">Sign up now.</a>
                <h1 class="mb-4 pb-4 text-xl pt-36">
                Or if you already have account sign in now.
                </h1>
                <br />
                <a href="/login" class="bg-yellow-500 hover:bg-yellow-300 px-4 py-2 text-color-white mt-4 rounded shadow hover:shadow-lg">Sign In now</a>
             </div>
            <div class="bg-gray-700">
                <img src="/img/COVID.png" class="w-full">
            </div>
        </div>
    </div>
</template>

<style scoped>
    .bg-gray-100 {
        background-color: #f7fafc;
        background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
    }

    .border-gray-200 {
        border-color: #edf2f7;
        border-color: rgba(237, 242, 247, var(--tw-border-opacity));
    }

    .text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }

    .text-gray-500 {
        color: #a0aec0;
        color: rgba(160, 174, 192, var(--tw-text-opacity));
    }

    .text-gray-600 {
        color: #718096;
        color: rgba(113, 128, 150, var(--tw-text-opacity));
    }

    .text-gray-700 {
        color: #4a5568;
        color: rgba(74, 85, 104, var(--tw-text-opacity));
    }

    .text-gray-900 {
        color: #1a202c;
        color: rgba(26, 32, 44, var(--tw-text-opacity));
    }

    @media (prefers-color-scheme: dark) {
        .dark\:bg-gray-800 {
            background-color: #2d3748;
            background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
        }

        .dark\:bg-gray-900 {
            background-color: #1a202c;
            background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
        }

        .dark\:border-gray-700 {
            border-color: #4a5568;
            border-color: rgba(74, 85, 104, var(--tw-border-opacity));
        }

        .dark\:text-white {
            color: #fff;
            color: rgba(255, 255, 255, var(--tw-text-opacity));
        }

        .dark\:text-gray-400 {
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--tw-text-opacity));
        }
    }
</style>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
      Head,
      Link,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
}
</script>
