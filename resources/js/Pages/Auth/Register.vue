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
                                Start optimizing your APIs today
                            </h2>
                            <p class="text-lg text-base-content/70">
                                Join developers using 200 OK to diagnose
                                performance issues, improve reliability, and
                                implement best practices.
                            </p>
                        </div>

                        <div class="card bg-base-200 border-0">
                            <div class="card-body">
                                <div class="flex items-start gap-3">
                                    <div class="avatar placeholder">

                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm italic text-base-content/80">
                                            "200 OK helped us reduce API latency
                                            by 40% and identify critical caching
                                            opportunities we were missing."
                                        </p>
                                        <p class="text-xs text-base-content/60 mt-2">
                                            — Mohamed Yasser, Lead Developer
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="stats shadow border border-base-300">
                            <div class="stat place-items-center">
                                <div class="stat-value text-primary">1k+</div>
                                <div class="stat-desc">APIs analyzed</div>
                            </div>
                            <div class="stat place-items-center">
                                <div class="stat-value text-secondary">
                                    500+
                                </div>
                                <div class="stat-desc">Users</div>
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
                                        Create account
                                    </h1>
                                    <p class="text-base-content/70">
                                        Start your free trial today
                                    </p>
                                </div>

                                <form class="space-y-4" @submit.prevent autocomplete="on">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <label class="form-control w-full">
                                            <div class="label">
                                                <span class="label-text font-medium">First name</span>
                                            </div>
                                            <input type="text" placeholder="John"
                                                class="input input-bordered w-full focus:input-primary" required />
                                        </label>

                                        <label class="form-control w-full">
                                            <div class="label">
                                                <span class="label-text font-medium">Last name</span>
                                            </div>
                                            <input type="text" placeholder="Doe"
                                                class="input input-bordered w-full focus:input-primary" required />
                                        </label>
                                    </div>

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
                                                " placeholder="Create a strong password"
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
                                        <div class="label">
                                            <span class="label-text-alt text-base-content/60">Must be at least 8
                                                characters</span>
                                        </div>
                                    </label>

                                    <label class="label cursor-pointer justify-start gap-3 p-0">
                                        <input type="checkbox" class="checkbox checkbox-primary checkbox-sm" required />
                                        <span class="label-text text-sm">
                                            I agree to the
                                            <a href="#" class="link link-primary">Terms of Service</a>
                                            and
                                            <a href="#" class="link link-primary">Privacy Policy</a>
                                        </span>
                                    </label>

                                    <button type="submit" class="btn btn-primary w-full">
                                        Create account
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
                                    <span class="text-base-content/70">Already have an account?</span>
                                    <Link :href="route('login')" class="link link-primary ml-1 font-semibold">
                                    Sign in
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
