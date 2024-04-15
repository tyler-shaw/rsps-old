<template>
    <WebsiteLayout>
        <div class="flex justify-between border py-3 rounded-lg mb-5 shadow-sm bg-slate-300">
            <div class="w-1/2">
                <button class="m-2 px-3 py-2 border rounded-md mx-2">Go Premium</button>
                <button class="m-2 px-3 py-2 border rounded-md mx-2">Sponsor Info</button>
            </div>
            <div class="w-1/2 text-right">
                <button class="m-2 px-3 py-2 border rounded-md mx-2">Add Your Server</button>
            </div>
        </div>

        <div class="border rounded-lg mb-5 shadow-sm">
            <div class="border-b p-3">
                Sponsored Servers<br>
                These servers are our featured partners. They help support this site, and are some of the top servers at the moment. Check them out!
            </div>
            <div class="border-b p-3">
                SERVER EXAMPLE
            </div>
            <div class="border-b p-3">
                SERVER EXAMPLE
            </div>
            <div class="p-3">
                SERVER EXAMPLE
            </div>
        </div>

        <div class="border rounded-lg mb-1 shadow-sm">
            <div class="border-b p-3">
                RuneScape Private Servers<br>
                Find RSPS Private Servers on RSPS Guru - The best RSPS list!
            </div>
            <div class="border-b p-3">
                SERVER EXAMPLE
            </div>
            <div class="border-b p-3">
                SERVER EXAMPLE
            </div>
            <div class="p-3">
                SERVER EXAMPLE
            </div>
        </div>

        <div class="text-xs pl-2 mb-5">
            Status updates occur every 5 minutes. We check often to ensure the most accurate RSPS data for visitors at Rsps Guru.
        </div>

        <div class="text-center mb-8">
            Pagination here
        </div>
    </WebsiteLayout>
</template>

<script setup>
    import WebsiteLayout from '@/Layouts/WebsiteLayout.vue';
</script>

