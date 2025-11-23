<script setup>
import { ref, onMounted } from "vue";
import { IconSun, IconMoon, IconMenu2 } from "@tabler/icons-vue";
import { Link } from "@inertiajs/vue3";

// Props
const props = defineProps({
    showFooter: {
        type: Boolean,
        default: true,
    },
});

const year = new Date().getFullYear();
const theme = ref("light");

function applyTheme(t) {
    document.documentElement.setAttribute("data-theme", t);
}

function toggleTheme() {
    theme.value = theme.value === "light" ? "dark" : "light";
    localStorage.setItem("theme", theme.value);
    applyTheme(theme.value);
}

onMounted(() => {
    const saved = localStorage.getItem("theme");
    if (saved === "dark" || saved === "light") {
        theme.value = saved;
    } else if (
        window.matchMedia &&
        window.matchMedia("(prefers-color-scheme: dark)").matches
    ) {
        theme.value = "dark";
    } else {
        theme.value = "light";
    }
    applyTheme(theme.value);
});
</script>

<template>
    <div class="min-h-screen bg-base-100" :class="{ 'overflow-y-hidden h-screen': hideScroll }">
        <nav class="bg-base-100 border-b border-base-200 sticky top-0 z-50">
            <div class="navbar container mx-auto px-4 sm:px-6">
                <div class="navbar-start">
                    <div class="dropdown">
                        <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                            <IconMenu2 size="24" />
                        </div>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content mt-3 z-10 p-2 shadow bg-base-100 rounded-box w-52">
                            <li><a href="#features">Features</a></li>
                            <li><a href="#how-it-works">How it works</a></li>
                            <li>
                                <a href="#recommendations">Recommendations</a>
                            </li>
                            <li><a href="#faq">FAQ</a></li>
                        </ul>
                    </div>
                    <Link :href="route('landing')" class="btn btn-ghost text-xl font-bold">
                    200 OK
                    </Link>
                </div>
                <div class="navbar-center hidden lg:flex">
                    <ul class="menu menu-horizontal px-1 font-medium">
                        <li><a href="#features">Features</a></li>
                        <li><a href="#how-it-works">How it works</a></li>
                        <li><a href="#recommendations">Recommendations</a></li>
                        <li><a href="#faq">FAQ</a></li>
                    </ul>
                </div>
                <div class="navbar-end gap-2">
                    <button class="btn btn-ghost btn-circle" @click="toggleTheme">
                        <IconSun v-if="theme === 'light'" size="20" />
                        <IconMoon v-else size="20" />
                    </button>
                    <Link :href="route('login')" class="btn btn-ghost hidden sm:inline-flex">Log in</Link>
                    <Link :href="route('register')" class="btn btn-primary">Sign up</Link>
                </div>
            </div>
        </nav>

        <main class="container mx-auto px-6">
            <slot />
        </main>

        <footer v-if="showFooter" class="bg-base-100 border-t border-base-200 mt-auto">
            <div class="container mx-auto px-6 py-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                    <div class="md:col-span-2">
                        <Link :href="route('landing')" class="text-xl font-bold mb-4 block">200 OK</Link>
                        <p class="text-base-content/70 max-w-sm">
                            Measure, optimize, and standardize your APIs with
                            intelligent diagnostics and actionable insights.
                        </p>
                    </div>

                    <div>
                        <h4 class="font-semibold mb-4 text-base-content">
                            Product
                        </h4>
                        <ul class="space-y-2 text-sm text-base-content/70">
                            <li>
                                <a href="#features" class="hover:text-primary transition-colors">Features</a>
                            </li>
                            <li>
                                <a href="#how-it-works" class="hover:text-primary transition-colors">How it works</a>
                            </li>
                            <li>
                                <a href="#recommendations"
                                    class="hover:text-primary transition-colors">Recommendations</a>
                            </li>
                            <li>
                                <a href="#faq" class="hover:text-primary transition-colors">FAQ</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-semibold mb-4 text-base-content">
                            Company
                        </h4>
                        <ul class="space-y-2 text-sm text-base-content/70">
                            <li>
                                <a href="#" class="hover:text-primary transition-colors">About</a>
                            </li>
                            <li>
                                <a href="#" class="hover:text-primary transition-colors">Blog</a>
                            </li>
                            <li>
                                <a href="#" class="hover:text-primary transition-colors">Contact</a>
                            </li>
                            <li>
                                <Link :href="route('register')" class="hover:text-primary transition-colors">Start for
                                free</Link>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="border-t border-base-200 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-sm text-base-content/60">
                        © {{ year }} 200 OK. All rights reserved.
                    </p>
                    <div class="flex gap-6 text-sm text-base-content/60">
                        <a href="#" class="hover:text-base-content transition-colors">Privacy Policy</a>
                        <a href="#" class="hover:text-base-content transition-colors">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<style scoped></style>
