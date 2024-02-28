/** @format */
import { VuexModule } from 'vuex-module-decorators';

import { WorkspaceModel } from '@/auth/store/models/WorkspaceModel';

export default class WorkspaceModule extends VuexModule implements WorkspaceModel {}
