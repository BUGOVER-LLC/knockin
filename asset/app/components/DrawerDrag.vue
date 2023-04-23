<!-- @format -->

<template>
    <div>
        <v-navigation-drawer ref="drawer" v-model="navigation.shown" app :right="right" :width="navigation.width">
            <v-toolbar color="grey lighten-4" height="70" @dblclick="toggle">
                <v-toolbar-title class="headline text-uppercase">
                    <span>f i</span><span class="font-weight-light"> l e s </span>
                </v-toolbar-title>
            </v-toolbar>
            <v-tabs>
                <v-tab v-for="n in 3" :key="n"> Item {{ n }} </v-tab>
                <v-tab-item v-for="n in 3" :key="n">
                    <v-card flat>
                        <v-card-text>Content for tab {{ n }} would go here</v-card-text>
                    </v-card>
                </v-tab-item>
            </v-tabs>
        </v-navigation-drawer>
        <v-layout justify-center>
            <v-btn @click="navigation.shown = !navigation.shown">Toggle {{ direction }}</v-btn>
        </v-layout>
    </div>
</template>

<script>
export default {
    props: {
        right: {
            required: false,
            type: Boolean,
            default: false,
        },
        width: {
            required: false,
            type: [Number, String],
            default: 400,
        },
    },

    data() {
        return {
            navigation: {
                shown: true,
                width: this.width,
                borderSize: 4,
            },
        };
    },

    computed: {
        direction() {
            return false === this.navigation.shown ? 'Open' : 'Closed';
        },
    },

    mounted() {
        this.setBorderWidth();
        this.setEvents();
    },

    methods: {
        setBorderWidth() {
            const i = this.$refs.drawer.$el.querySelector('.v-navigation-drawer__border');
            i.style.width = `${this.navigation.borderSize}px`;
            i.style.cursor = 'ew-resize';
        },
        setEvents() {
            const minSize = this.navigation.borderSize;
            const el = this.$refs.drawer.$el;
            const drawerBorder = el.querySelector('.v-navigation-drawer__border');
            const vm = this;
            const direction = el.classList.contains('v-navigation-drawer--right') ? 'right' : 'left';

            /**
             *
             * @param e
             */
            function resize(e) {
                document.body.style.cursor = 'ew-resize';
                const f = 'right' === direction ? document.body.scrollWidth - e.clientX : e.clientX;
                el.style.width = `${f}px`;
            }

            drawerBorder.addEventListener(
                'mousedown',
                e => {
                    if (e.offsetX < minSize) {
                        const m_pos = e.x;
                        el.style.transition = 'initial';
                        document.addEventListener('mousemove', resize, false);
                    }
                },
                false,
            );

            document.addEventListener(
                'mouseup',
                () => {
                    el.style.transition = '';
                    vm.navigation.width = el.style.width;
                    document.body.style.cursor = '';
                    document.removeEventListener('mousemove', resize, false);
                },
                false,
            );
        },
        toggle() {
            this.navigation.shown = !this.navigation.shown;
        },
    },
};
</script>
