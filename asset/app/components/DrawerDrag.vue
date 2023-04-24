<!-- @format -->

<template>
    <div>
        <v-navigation-drawer
            ref="drawer"
            app
            :right="right"
            :width="navigation.width"
            v-model="navigation.shown"
            :mini-variant="mini"
            :absolute="absolute"
        >
            <slot name="toolbar"></slot>
            <slot name="content"></slot>
            <slot name="footer"></slot>
        </v-navigation-drawer>
        <!--        <v-layout justify-center>-->
        <!--            <v-btn @click="navigation.shown = !navigation.shown">Toggle {{ direction }}</v-btn>-->
        <!--        </v-layout>-->
    </div>
</template>

<script lang="ts">
import { Component, Vue, Ref, Prop } from 'vue-property-decorator';

@Component({
    components: {},
    mixins: [],
})
export default class DrawerDrag extends Vue {
    @Prop({ type: [Number, String], default: 300, required: false })
    protected readonly navigationWidth: number | string = 300;

    @Prop({ type: Boolean, default: false, required: false })
    protected readonly mini: boolean = false;

    @Prop({ type: Boolean, default: true, required: false })
    protected readonly right: boolean = true;

    @Prop({ type: Boolean, default: true, required: false })
    protected readonly absolute: boolean = true;

    @Ref()
    drawer: any;

    private navigation: any = {
        shown: true,
        width: this.navigationWidth,
        borderSize: 4,
    };

    get direction(): string {
        return this.navigation.shown ? 'Closed' : 'Open';
    }

    mounted() {
        this.setBorderWidth();
        this.setEvents();
    }

    setBorderWidth(): void {
        const drawers = this.drawer.$el.querySelectorAll('.v-navigation-drawer__border');
        const drawer = 1 < drawers.length ? drawers[1] : drawers[0];
        drawer.style.width = this.navigation.borderSize + 'px';
        drawer.style.cursor = 'ew-resize';
    }

    setEvents(): void {
        const minSize = this.navigation.borderSize;
        const el = this.drawer.$el;
        const drawers = el.querySelectorAll('.v-navigation-drawer__border');
        const drawerBorder = 1 < drawers.length ? drawers[1] : drawers[0];
        const vm = this;
        const direction = el.classList.contains('v-navigation-drawer--right') ? 'right' : 'left';

        function resize(e) {
            document.body.style.cursor = 'ew-resize';
            let f = 'right' === direction ? document.body.scrollWidth - e.clientX : e.clientX;
            el.style.width = f + 'px';
        }

        drawerBorder.addEventListener(
            'mousedown',
            function (e) {
                if (e.offsetX < minSize) {
                    const mPos = e.x;
                    el.style.transition = 'initial';
                    document.addEventListener('mousemove', resize, false);
                }
            },
            false,
        );

        document.addEventListener(
            'mouseup',
            function () {
                el.style.transition = '';
                vm.navigation.width = el.style.width;
                document.body.style.cursor = '';
                document.removeEventListener('mousemove', resize, false);
            },
            false,
        );
    }
}
</script>
