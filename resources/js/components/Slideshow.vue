<template>
    <article class="relative w-full flex flex-shrink-0 overflow-hidden shadow">
        <div class="rounded-full bg-gray-600 text-white absolute top-5 right-5 text-sm px-2 text-center z-10">
            <span>
                {{ currentIndex }}
            </span>/
            <span>
                {{ images.length }}
            </span>
        </div>

        <template v-for="(image, index) in images">
            <figure v-show="currentIndex === index + 1" class="h-96">
                <img :src="'/storage/'+image.image" alt="Image"
                     class="absolute inset-0 z-10 h-full w-full object-cover"/>
                <figcaption v-show="image.caption"
                            class="absolute inset-x-0 bottom-1 z-20 w-96 mx-auto p-4 font-light text-sm text-center tracking-widest leading-snug bg-gray-300 bg-opacity-25">
                    {{ image.caption }}
                </figcaption>
            </figure>
        </template>
        <div class="flex justify-between w-full items-center m-4">
            <button
                class="w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200"
                @click="back()">
                <svg
                    class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:-translate-x-0.5"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5">
                    </path>
                </svg>
            </button>

            <button
                class="w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200"
                @click="next()">
                <svg
                    class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:translate-x-0.5"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"></path>
                </svg>
            </button>
        </div>
    </article>
</template>

<script>
export default {
    name: "Slideshow",
    props: {
        images: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            currentIndex: 1
        }
    },
    methods: {
        next() {
            if (this.currentIndex < this.images.length) {
                this.currentIndex++;
            } else {
                this.currentIndex = 1;
            }
        },
        back() {
            if (this.currentIndex > 1) {
                this.currentIndex--;
            } else {
                this.currentIndex = this.images.length;
            }
        }
    }
}
</script>

<style scoped>

</style>
