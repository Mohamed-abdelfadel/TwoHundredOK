<script setup>
import GuestLayout from './Layouts/GuestLayout.vue'
import { ref } from 'vue'
import { IconPlayerPlay, IconBolt, IconDatabase, IconShieldCheck, IconBook2, IconBox, IconRocket, IconLock } from '@tabler/icons-vue'

const endpoint = ref('')
const loading = ref(false)
const result = ref(null)
const origin = typeof window !== 'undefined' ? window.location.origin : ''

async function runQuickTest() {
    loading.value = true
    try {
        const url = endpoint.value || `${origin}/api/ping`
        const start = performance.now()
        const res = await fetch(url, { method: 'GET' })
        const time = Math.round(performance.now() - start)
        const reader = res.body?.getReader?.()
        let size = 0
        if (reader) {
            while (true) {
                const { done, value } = await reader.read()
                if (done) break
                size += value.byteLength
            }
        } else {
            const text = await res.text()
            size = new Blob([text]).size
        }
        result.value = { time, size: Math.round(size / 1024), status: res.status }
    } catch (e) {
        result.value = { time: 0, size: 0, status: 'ERR' }
    } finally {
        loading.value = false
    }
}
</script>

<template>
    <GuestLayout>
        <section class="py-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center mb-16">
                <div class="space-y-6">
                    <span class="badge badge-primary badge-outline">200 OK</span>
                    <h1 class="text-5xl lg:text-6xl font-bold leading-tight">Diagnose and optimize your APIs</h1>
                    <p class="text-base-content/70">Analyze latency, payloads, headers, rate limits, and consistency.
                        Import Swagger/Postman to get actionable recommendations fast.</p>
                    <div class="flex gap-3">
                        <button class="btn btn-primary">
                            <IconRocket class="mr-2" size="18" /> Start free
                        </button>
                        <button class="btn btn-ghost">View demo</button>
                    </div>
                </div>
                <div>
                    <div class="mockup-window border bg-base-300">
                        <div class="bg-base-200 px-6 py-8">
                            <div class="mockup-code">
                                <pre
                                    data-prefix="$"><code>curl -s -w "%{time_total}" -o /dev/null {{ origin }}/api/ping</code></pre>
                                <pre
                                    data-prefix=">"><code>200 OK · gzip · cache-control: public, max-age=60</code></pre>
                                <pre
                                    data-prefix=">"><code>Recommendations: enable br, add ETag, paginate list endpoints</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="py-4"></section>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div class="space-y-6">
                    <h1 class="text-4xl lg:text-5xl font-bold">Intelligent API diagnostics</h1>
                    <p class="text-base-content/70">Test endpoints, analyze performance, import Swagger/Postman, and get
                        optimization recommendations — fast.</p>

                    <div class="card bg-base-100 border border-base-300 shadow-md">
                        <div class="card-body">
                            <form @submit.prevent="runQuickTest"
                                class="space-y-4 flex justify-center flex-col items-center">
                                <label class="form-control ">
                                    <div class="label">
                                        <h1 class="text-2xl">Test Your API</h1>
                                    </div>
                                </label>
                                <input v-model="endpoint" type="url" :placeholder="`${origin}/api/ping`"
                                    class="input input-bordered w-full" required />
                                <button class="btn btn-primary w-full " :disabled="loading">
                                    <IconPlayerPlay class="mr-2" size="18" />
                                    {{ loading ? 'Testing…' : 'Run Test' }}
                                </button>
                            </form>

                            <div v-if="result" class="mt-3 mx-auto">
                                <div class="stats shadow">
                                    <div class="stat">
                                        <div class="stat-figure text-primary">
                                            <IconBolt size="20" />
                                        </div>
                                        <div class="stat-title">Latency</div>
                                        <div class="stat-value">{{ result.time }} ms</div>
                                    </div>
                                    <div class="stat">
                                        <div class="stat-figure text-secondary">
                                            <IconDatabase size="20" />
                                        </div>
                                        <div class="stat-title">Payload</div>
                                        <div class="stat-value">{{ result.size }} KB</div>
                                    </div>
                                    <div class="stat">
                                        <div class="stat-figure text-accent">
                                            <IconShieldCheck size="20" />
                                        </div>
                                        <div class="stat-title">Status</div>
                                        <div class="stat-value">{{ result.status }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="card bg-base-100 border border-base-300 shadow">
                            <div class="card-body">
                                <h3 class="card-title">
                                    <IconBolt class="mr-2" /> Performance
                                </h3>
                                <p class="text-base-content/70">Measure p95 latency, payload size, compression, and TTFT
                                    to spot bottlenecks.</p>
                            </div>
                        </div>
                        <div class="card bg-base-100 border border-base-300 shadow">
                            <div class="card-body">
                                <h3 class="card-title">
                                    <IconShieldCheck class="mr-2" /> Reliability
                                </h3>
                                <p class="text-base-content/70">Timeouts, retries/backoff, consistent status codes,
                                    error formats.</p>
                            </div>
                        </div>
                        <div class="card bg-base-100 border border-base-300 shadow">
                            <div class="card-body">
                                <h3 class="card-title">
                                    <IconDatabase class="mr-2" /> Design & Caching
                                </h3>
                                <p class="text-base-content/70">Pagination, fields filtering, ETag/Cache-Control tuning,
                                    versioning.</p>
                            </div>
                        </div>
                        <div class="card bg-base-100 border border-base-300 shadow">
                            <div class="card-body">
                                <h3 class="card-title">
                                    <IconLock class="mr-2" /> Security
                                </h3>
                                <p class="text-base-content/70">HTTPS-only, auth on sensitive endpoints, CORS, limit PII
                                    exposure.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="how-it-works" class="mt-16">
                <h2 class="text-3xl font-bold mb-6">How it works</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="card bg-base-100 border border-base-300 shadow">
                        <div class="card-body">
                            <h3 class="card-title">1. Import</h3>
                            <p class="text-base-content/70">Connect Swagger/OpenAPI or Postman collections to discover
                                endpoints at scale.</p>
                        </div>
                    </div>
                    <div class="card bg-base-100 border border-base-300 shadow">
                        <div class="card-body">
                            <h3 class="card-title">2. Analyze</h3>
                            <p class="text-base-content/70">Run tests to collect latency, sizes, headers, status
                                consistency, and reliability signals.</p>
                        </div>
                    </div>
                    <div class="card bg-base-100 border border-base-300 shadow">
                        <div class="card-body">
                            <h3 class="card-title">3. Recommend</h3>
                            <p class="text-base-content/70">Get prioritized fixes with rationale: compression, caching,
                                pagination, and resilience.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="recommendations" class="mt-16">
                <h2 class="text-3xl font-bold mb-6">Recommendations engine</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="card bg-base-100 border border-base-300 shadow">
                        <div class="card-body">
                            <h3 class="card-title">Performance</h3>
                            <p class="text-base-content/70">Enable gzip/br, trim payloads, and paginate high-cardinality
                                lists to reduce latency.</p>
                        </div>
                    </div>
                    <div class="card bg-base-100 border border-base-300 shadow">
                        <div class="card-body">
                            <h3 class="card-title">Reliability</h3>
                            <p class="text-base-content/70">Configure timeouts, retries/backoff, circuit breakers, and
                                standardized error bodies.</p>
                        </div>
                    </div>
                    <div class="card bg-base-100 border border-base-300 shadow">
                        <div class="card-body">
                            <h3 class="card-title">Design</h3>
                            <p class="text-base-content/70">Consistent status codes, versioning strategy, idempotency
                                for write operations, and pagination.</p>
                        </div>
                    </div>
                    <div class="card bg-base-100 border border-base-300 shadow">
                        <div class="card-body">
                            <h3 class="card-title">Caching</h3>
                            <p class="text-base-content/70">Use ETag/Last-Modified and tuned Cache-Control directives to
                                improve responsiveness.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="use-cases" class="mt-16">
                <h2 class="text-3xl font-bold mb-6">Use cases</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="card bg-base-100 border border-base-300 shadow">
                        <div class="card-body">
                            <h3 class="card-title">API Owners</h3>
                            <p class="text-base-content/70">Validate performance and best practices before releases and
                                track improvements.</p>
                        </div>
                    </div>
                    <div class="card bg-base-100 border border-base-300 shadow">
                        <div class="card-body">
                            <h3 class="card-title">QA Teams</h3>
                            <p class="text-base-content/70">Run regression checks on endpoints and collections to catch
                                breaking changes.</p>
                        </div>
                    </div>
                    <div class="card bg-base-100 border border-base-300 shadow">
                        <div class="card-body">
                            <h3 class="card-title">Developers</h3>
                            <p class="text-base-content/70">Optimize payloads, caching, and error handling with
                                concrete, testable recommendations.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="faq" class="mt-16">
                <h2 class="text-3xl font-bold mb-6">FAQ</h2>
                <div class="join join-vertical w-full">
                    <div class="collapse collapse-arrow join-item border border-base-300">
                        <input type="radio" name="faq" checked />
                        <div class="collapse-title text-lg font-medium">Do I need to log in?</div>
                        <div class="collapse-content">
                            <p>Quick tests do not require login. Importing Swagger/Postman and saving analyses require
                                authentication.</p>
                        </div>
                    </div>
                    <div class="collapse collapse-arrow join-item border border-base-300">
                        <input type="radio" name="faq" />
                        <div class="collapse-title text-lg font-medium">What formats are supported?</div>
                        <div class="collapse-content">
                            <p>Swagger/OpenAPI (URL or JSON) and Postman collections are supported for import.</p>
                        </div>
                    </div>
                    <div class="collapse collapse-arrow join-item border border-base-300">
                        <input type="radio" name="faq" />
                        <div class="collapse-title text-lg font-medium">What metrics are measured?</div>
                        <div class="collapse-content">
                            <p>Latency (avg, p95), payload size, headers (compression, caching, CORS), status codes, and
                                reliability signals.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-16 flex items-center justify-between bg-base-200 rounded-box p-6">
                <div>
                    <h3 class="text-2xl font-bold">Ready to measure and optimize?</h3>
                    <p class="text-base-content/70">Start free and analyze your endpoints in minutes.</p>
                </div>
                <button class="btn btn-primary">
                    <IconRocket class="mr-2" size="18" /> Start free
                </button>
            </div>
        </section>
    </GuestLayout>
</template>

<style scoped></style>
