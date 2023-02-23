<template>
    <transition name="fade">
        <button v-show="scY > 300"
                class="z-10 fixed bottom-5 right-5 inline-block rounded-full bg-red-600 p-2 leading-normal text-white focus:bg-danger-600 focus:outline-none focus:ring-0"
                data-te-ripple-color="light"
                data-te-ripple-init type="button" @click="toTop">
            <svg
                class="h-4 w-4" fill="currentColor" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75"
                      fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </transition>
</template>

<script>
export default {
    name: "BackToTop",
    data() {
        return {
            scTimer: 0,
            scY: 0,
        }
    },
    mounted() {
        window.addEventListener('scroll', this.handleScroll);
    },
    methods: {
        handleScroll: function () {
            if (this.scTimer) return;
            this.scTimer = setTimeout(() => {
                this.scY = window.scrollY;
                clearTimeout(this.scTimer);
                this.scTimer = 0;
            }, 100);
        },
        toTop: function () {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        },
    }
}
</script>

<style scoped>

</style>
