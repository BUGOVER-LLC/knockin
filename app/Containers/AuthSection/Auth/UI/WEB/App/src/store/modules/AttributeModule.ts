/** @format */

import Vue from 'vue';
import { Action, Module, Mutation, VuexModule, getModule } from 'vuex-module-decorators';

import { DeleteAttribute, EditAttribute, GetAttributes, StoreAttribute } from '@/services/api/AttributeApi';
import { CreateAttributeModel } from '@/services/api/Model/CreateAttributeModel';
import store from '@/store';
import { AttributeModel } from '@/store/models/AttributeModel';
import modulesNames from '@/store/moduleNames';

@Module({ dynamic: true, namespaced: true, store, name: modulesNames.attributeModule })
class AttributeModule extends VuexModule {
    private _attributes: Record<string, AttributeModel> = {};
    private attributeLoading: boolean = false;

    // MUTATIONS
    @Mutation
    private emitAttributes(attributes: AttributeModel | AttributeModel[]) {
        if (Array.isArray(attributes)) {
            attributes.forEach((item: AttributeModel) => Vue.set(this._attributes, item.attributeId, item));
        } else {
            Vue.set(this._attributes, attributes.attributeId, attributes);
        }
    }

    @Mutation
    private emitDeleteAttribute(attributeId: number) {
        Vue.delete(this._attributes, attributeId);
    }

    @Mutation
    private emitAttributeLoading(val: boolean) {
        this.attributeLoading = val;
    }

    // ACTIONS
    @Action({ rawError: true })
    public async initAttributes() {
        this.emitAttributeLoading(true);
        const res = await GetAttributes();
        this.emitAttributes(res._payload);
        this.emitAttributeLoading(false);

        return res;
    }

    @Action({ rawError: true })
    public async createAttribute(data: CreateAttributeModel) {
        const res = await StoreAttribute(data);
        this.emitAttributes(res._payload);

        return res;
    }

    @Action({ rawError: true })
    public async editAttribute(data) {
        const res = await EditAttribute(data);
        this.emitAttributes(res._payload);

        return res;
    }

    @Action({ rawError: true })
    public async deleteAttribute(attributeId: number) {
        const res = await DeleteAttribute(attributeId);
        this.emitDeleteAttribute(attributeId);

        return res;
    }

    // GETTERS
    public get attributes(): Record<string, AttributeModel> {
        return this._attributes;
    }

    public get attributesLoading(): boolean {
        return this.attributeLoading;
    }
}

export default getModule(AttributeModule);
