<script setup>
import GuestLayout from "../Layouts/GuestLayout.vue";
import { ref } from "vue";
import { IconEye, IconEyeOff, IconBrandGoogleFilled } from "@tabler/icons-vue";
import { Link } from "@inertiajs/vue3";

const showPassword = ref(false);
</script>

<template>
    <GuestLayout :showFooter="false" :hideScroll="true">
        <section class="h-[calc(100vh-64px)] flex items-center justify-center overflow-hidden">
            <div class="w-full px-4">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl w-full mx-auto">
                    <div class="hidden lg:flex flex-col justify-center space-y-6 p-8">
                        <div class="space-y-4">
                            <span class="badge badge-primary badge-lg">200 OK</span>
                            <h2 class="text-5xl font-bold leading-tight">
                                Diagnose and optimize your APIs
                            </h2>
                            <p class="text-lg text-base-content/70">
                                Analyze latency, payloads, headers, rate limits,
                                and consistency. Get actionable recommendations
                                fast.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 gap-4 mt-8">
                            <div class="flex items-start gap-3">
                                <div class="badge badge-primary badge-sm mt-1">
                                    ✓
                                </div>
                                <div>
                                    <h4 class="font-semibold">
                                        Intelligent diagnostics
                                    </h4>
                                    <p class="text-sm text-base-content/60">
                                        Import Swagger/Postman and get instant
                                        recommendations
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="badge badge-primary badge-sm mt-1">
                                    ✓
                                </div>
                                <div>
                                    <h4 class="font-semibold">
                                        Performance insights
                                    </h4>
                                    <p class="text-sm text-base-content/60">
                                        Measure latency, payload size, and
                                        compression
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="badge badge-primary badge-sm mt-1">
                                    ✓
                                </div>
                                <div>
                                    <h4 class="font-semibold">
                                        Best practices
                                    </h4>
                                    <p class="text-sm text-base-content/60">
                                        Ensure reliability, security, and
                                        caching standards
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-center">
                        <div class="card bg-base-100 border border-base-300 shadow-lg w-full max-w-md">
                            <div class="card-body space-y-6">
                                <div class="flex justify-center lg:hidden">
                                    <span class="badge badge-primary badge-outline">200 OK</span>
                                </div>

                                <div class="text-center space-y-2">
                                    <h1 class="text-3xl lg:text-4xl font-bold">
                                        Welcome back
                                    </h1>
                                    <p class="text-base-content/70">
                                        Sign in to your account
                                    </p>
                                </div>

                                <form class="space-y-4" @submit.prevent autocomplete="on">
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text font-medium">Email address</span>
                                        </div>
                                        <input type="email" placeholder="you@example.com"
                                            class="input input-bordered w-full focus:input-primary" required />
                                    </label>

                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text font-medium">Password</span>
                                        </div>
                                        <div class="relative">
                                            <input :type="showPassword
                                                ? 'text'
                                                : 'password'
                                                " placeholder="Enter your password"
                                                class="input input-bordered w-full pr-12 focus:input-primary"
                                                required />
                                            <button type="button"
                                                class="btn btn-ghost btn-sm absolute right-1 top-1/2 -translate-y-1/2 z-10"
                                                @click="
                                                    showPassword = !showPassword
                                                    ">
                                                <IconEyeOff v-if="!showPassword" size="18" />
                                                <IconEye v-else size="18" />
                                            </button>
                                        </div>
                                    </label>

                                    <div class="flex items-center justify-between text-sm">
                                        <label class="label cursor-pointer gap-2 p-0">
                                            <input type="checkbox" class="checkbox checkbox-primary checkbox-sm" />
                                            <span class="label-text">Remember me</span>
                                        </label>
                                        <a href="#" class="link link-primary link-hover">Forgot password?</a>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-full">
                                        Sign in
                                    </button>
                                </form>

                                <div class="divider text-xs text-base-content/60">
                                    OR CONTINUE WITH
                                </div>

                                <button class="btn btn-outline w-full hover:btn-ghost">
                                    <IconBrandGoogleFilled class="mr-2" size="18" />
                                    Google
                                </button>

                                <div class="text-center text-sm pt-2">
                                    <span class="text-base-content/70">Don't have an account?</span>
                                    <Link :href="route('register')" class="link link-primary ml-1 font-semibold">
                                    Sign up
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>


<style scoped></style>
