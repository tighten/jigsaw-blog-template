<template>
    <a href="#" class="bg-blue flex md:hidden justify-center items-center ml-4 px-4 py-2 rounded-full" @click="toggleVisible()">
        <svg v-if="! displayMobileNav" class="fill-current text-white flex h-9 w-4" version="1.1" viewBox="0 0 32 32"
            xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/>
        </svg>

        <svg class="fill-current text-white flex h-9 w-4" v-if="displayMobileNav" viewBox="0 0 36 30">
            <polygon points="32.8,4.4 28.6,0.2 18,10.8 7.4,0.2 3.2,4.4 13.8,15 3.2,25.6 7.4,29.8 18,19.2 28.6,29.8 32.8,25.6 22.2,15 "/>
        </svg>
    </a>
</template>

<script>
export default {
    data() {
        return {
            displayMobileNav: false,
        }
    },

    methods: {
        toggleVisible() {
            this.displayMobileNav = ! this.displayMobileNav;

            this.$root.$emit('menu-toggle', this.displayMobileNav);
        }
    }
}
</script>
