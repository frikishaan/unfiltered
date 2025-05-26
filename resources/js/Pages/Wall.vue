<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, WhenVisible } from '@inertiajs/vue3'

defineProps({
    posts: Object
});
</script>

<template>
    <AppLayout>
        <Head title="unfiltered." />

        <div>
            <div v-for="post in posts.data" :key="post.id" class="border-1 border-gray-300 p-4 mb-4">
                {{ post.content }}
            </div>
        </div>

        <template v-if="posts.next_page_url">
            <WhenVisible 
                :params="{
                    data: {
                        page: posts.current_page + 1
                    },
                    only: ['posts'],
                    replace: false,
                    
                }"
                always 
            >
                 <template #fallback>
                    <div>Loading more posts...</div>
                </template>
            </WhenVisible>
        </template>
        <template v-else>
            --End--
        </template>
    </AppLayout>
</template>