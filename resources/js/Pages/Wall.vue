<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, WhenVisible } from '@inertiajs/vue3'
import { PhHeart } from '@phosphor-icons/vue';

defineProps({
    posts: Object
});

function handleReaction(postId) {
    console.log(`User reacted to post ID: ${postId}`);
}
</script>

<template>
    <AppLayout>
        <Head title="unfiltered." />

        <div class="max-w-2xl mx-auto px-2 sm:px-4 py-8">

            <div class="space-y-8">
                <div v-for="post in posts.data" :key="post.id"
                    class="border border-blue-600 border-2 rounded-none">
                    <div class="px-6 py-5">
                        <h2 class="text-lg font-semibold mb-2">
                            {{ post.title }}
                        </h2>
                        <div class="prose max-w-none" v-html="post.content"></div>
                        <div class="flex items-center gap-2 mt-2">
                          <PhHeart
                            size="24"
                            weight="regular"
                            class="cursor-pointer"
                            @click="() => handleReaction(post.id)"
                          />
                          <span class="text-sm">
                            {{ post.reactions_count ?? '' }}
                        </span>
                        </div>
                    </div>
                </div>
            </div>

            <template v-if="posts.next_page_url">
                <div class="flex justify-center mt-8">
                    <WhenVisible 
                        :params="{
                            data: {
                                page: posts.current_page + 1
                            },
                            only: ['posts'],
                            replace: false
                        }"
                        always 
                    >
                        <template #fallback>
                            <div class="text-blue-600 font-medium py-4">Loading more posts...</div>
                        </template>
                    </WhenVisible>
                </div>
            </template>
            <template v-else>
                <div class="mt-8 text-center text-gray-400 text-sm py-4">
                    <span>-- End --</span>
                </div>
            </template>
        </div>
    </AppLayout>
</template>

<style>
.post-content a {
    text-decoration: underline;
}
</style>