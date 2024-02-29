<!-- @format -->
<script lang="ts">
import { Vue, Component } from 'vue-property-decorator';
import CreateComponent from '@/auth/components/workspace/CreateComponent.vue';
import ChoiceComponent from '@/auth/components/workspace/ChoiceComponent.vue';
import axios from 'axios';

@Component({
    name: 'AuthWorkspace',
    components: {
        CreateComponent,
        ChoiceComponent,
    },
    template:
        '<v-container>\n' +
        '        <v-row cols="12">\n' +
        '            <v-col md="12">\n' +
        '                <ChoiceComponent />\n' +
        '            </v-col>\n' +
        '            <v-col md="12">\n' +
        '                <CreateComponent />\n' +
        '            </v-col>\n' +
        '        </v-row>\n' +
        '    </v-container>',
})
export default class SelectWorkspace extends Vue {
    private workspaces: object = {};

    created() {
        console.log(11122);
        axios.get(`'/workspaces'`).then().catch();
    }
}
</script>

<style scoped lang="scss"></style>
