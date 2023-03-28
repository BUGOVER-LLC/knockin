/** @format */

import { Module, Mutation, VuexModule } from 'vuex-module-decorators';

type State = {
    id: number | null;
    workspaceId: number | null;
    title: string | null;
    created: string | null;
    terms: string | null;
};

@Module({
    name: 'module/board',
    namespaced: true,
    stateFactory: true,
})
export default class Boards extends VuexModule {
    /**
     * @type State
     * @private
     */
    private _payload;

    @Mutation
    initBoard(payload: State) {
        this._payload = payload;
    }
}
